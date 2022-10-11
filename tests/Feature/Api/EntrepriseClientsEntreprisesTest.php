<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseClientsEntreprisesTest extends TestCase
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
    public function it_gets_entreprise_clients_entreprises()
    {
        $entreprise = Entreprise::factory()->create();
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.clients-entreprises.index', $entreprise)
        );

        $response->assertOk()->assertSee($clientsEntreprises[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_clients_entreprises()
    {
        $entreprise = Entreprise::factory()->create();
        $data = ClientsEntreprise::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.clients-entreprises.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $clientsEntreprise = ClientsEntreprise::latest('id')->first();

        $this->assertEquals($entreprise->id, $clientsEntreprise->entreprise_id);
    }
}
