<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DepensesPanier;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseDepensesPaniersTest extends TestCase
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
    public function it_gets_clients_entreprise_depenses_paniers()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $depensesPaniers = DepensesPanier::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route(
                'api.clients-entreprises.depenses-paniers.index',
                $clientsEntreprise
            )
        );

        $response->assertOk()->assertSee($depensesPaniers[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_depenses_paniers()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = DepensesPanier::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.clients-entreprises.depenses-paniers.store',
                $clientsEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('depenses_paniers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $depensesPanier = DepensesPanier::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $depensesPanier->clients_entreprise_id
        );
    }
}
