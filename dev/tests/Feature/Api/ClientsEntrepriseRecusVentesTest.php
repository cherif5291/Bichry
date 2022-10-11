<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RecusVente;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseRecusVentesTest extends TestCase
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
    public function it_gets_clients_entreprise_recus_ventes()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $recusVentes = RecusVente::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route(
                'api.clients-entreprises.recus-ventes.index',
                $clientsEntreprise
            )
        );

        $response->assertOk()->assertSee($recusVentes[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_recus_ventes()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = RecusVente::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.clients-entreprises.recus-ventes.store',
                $clientsEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recusVente = RecusVente::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $recusVente->clients_entreprise_id
        );
    }
}
