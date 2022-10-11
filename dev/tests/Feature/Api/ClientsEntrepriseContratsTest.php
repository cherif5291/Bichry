<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contrat;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseContratsTest extends TestCase
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
    public function it_gets_clients_entreprise_contrats()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $contrats = Contrat::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route('api.clients-entreprises.contrats.index', $clientsEntreprise)
        );

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_contrats()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = Contrat::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.clients-entreprises.contrats.store', $clientsEntreprise),
            $data
        );

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contrat = Contrat::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $contrat->clients_entreprise_id
        );
    }
}
