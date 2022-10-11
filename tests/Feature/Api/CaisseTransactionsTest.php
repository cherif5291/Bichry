<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caisse;
use App\Models\Transaction;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseTransactionsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_caisse_transactions()
    {
        $caisse = Caisse::factory()->create();
        $transactions = Transaction::factory()
            ->count(2)
            ->create([
                'caisse_id' => $caisse->id,
            ]);

        $response = $this->getJson(
            route('api.caisses.transactions.index', $caisse)
        );

        $response->assertOk()->assertSee($transactions[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_caisse_transactions()
    {
        $caisse = Caisse::factory()->create();
        $data = Transaction::factory()
            ->make([
                'caisse_id' => $caisse->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.caisses.transactions.store', $caisse),
            $data
        );

        $this->assertDatabaseHas('transactions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $transaction = Transaction::latest('id')->first();

        $this->assertEquals($caisse->id, $transaction->caisse_id);
    }
}
