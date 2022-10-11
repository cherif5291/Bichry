<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banque;
use App\Models\Reglement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueReglementsTest extends TestCase
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
    public function it_gets_banque_reglements()
    {
        $banque = Banque::factory()->create();
        $reglements = Reglement::factory()
            ->count(2)
            ->create([
                'banque_id' => $banque->id,
            ]);

        $response = $this->getJson(
            route('api.banques.reglements.index', $banque)
        );

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_banque_reglements()
    {
        $banque = Banque::factory()->create();
        $data = Reglement::factory()
            ->make([
                'banque_id' => $banque->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.banques.reglements.store', $banque),
            $data
        );

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reglement = Reglement::latest('id')->first();

        $this->assertEquals($banque->id, $reglement->banque_id);
    }
}
