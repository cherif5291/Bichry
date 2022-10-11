<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PaiementsModalite;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModaliteClientsEntreprisesTest extends TestCase
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
    public function it_gets_paiements_modalite_clients_entreprises()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(2)
            ->create([
                'paiements_modalite_id' => $paiementsModalite->id,
            ]);

        $response = $this->getJson(
            route(
                'api.paiements-modalites.clients-entreprises.index',
                $paiementsModalite
            )
        );

        $response->assertOk()->assertSee($clientsEntreprises[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_modalite_clients_entreprises()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $data = ClientsEntreprise::factory()
            ->make([
                'paiements_modalite_id' => $paiementsModalite->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.paiements-modalites.clients-entreprises.store',
                $paiementsModalite
            ),
            $data
        );

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $clientsEntreprise = ClientsEntreprise::latest('id')->first();

        $this->assertEquals(
            $paiementsModalite->id,
            $clientsEntreprise->paiements_modalite_id
        );
    }
}
