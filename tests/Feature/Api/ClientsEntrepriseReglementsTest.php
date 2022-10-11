<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Reglement;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseReglementsTest extends TestCase
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
    public function it_gets_clients_entreprise_reglements()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $reglements = Reglement::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route(
                'api.clients-entreprises.reglements.index',
                $clientsEntreprise
            )
        );

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_reglements()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = Reglement::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.clients-entreprises.reglements.store',
                $clientsEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reglement = Reglement::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $reglement->clients_entreprise_id
        );
    }
}
