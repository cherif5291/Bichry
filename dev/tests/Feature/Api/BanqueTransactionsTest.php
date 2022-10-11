<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banque;
use App\Models\Transaction;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueTransactionsTest extends TestCase
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
    public function it_gets_banque_transactions()
    {
        $banque = Banque::factory()->create();
        $transactions = Transaction::factory()
            ->count(2)
            ->create([
                'banque_id' => $banque->id,
            ]);

        $response = $this->getJson(
            route('api.banques.transactions.index', $banque)
        );

        $response->assertOk()->assertSee($transactions[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_banque_transactions()
    {
        $banque = Banque::factory()->create();
        $data = Transaction::factory()
            ->make([
                'banque_id' => $banque->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.banques.transactions.store', $banque),
            $data
        );

        $this->assertDatabaseHas('transactions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $transaction = Transaction::latest('id')->first();

        $this->assertEquals($banque->id, $transaction->banque_id);
    }
}
