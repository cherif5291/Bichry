<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeClientsEntreprisesTest extends TestCase
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
    public function it_gets_paiements_mode_clients_entreprises()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(2)
            ->create([
                'paiements_mode_id' => $paiementsMode->id,
            ]);

        $response = $this->getJson(
            route(
                'api.paiements-modes.clients-entreprises.index',
                $paiementsMode
            )
        );

        $response->assertOk()->assertSee($clientsEntreprises[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode_clients_entreprises()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $data = ClientsEntreprise::factory()
            ->make([
                'paiements_mode_id' => $paiementsMode->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.paiements-modes.clients-entreprises.store',
                $paiementsMode
            ),
            $data
        );

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $clientsEntreprise = ClientsEntreprise::latest('id')->first();

        $this->assertEquals(
            $paiementsMode->id,
            $clientsEntreprise->paiements_mode_id
        );
    }
}
