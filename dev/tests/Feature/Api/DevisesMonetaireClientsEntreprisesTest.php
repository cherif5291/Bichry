<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DevisesMonetaire;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisesMonetaireClientsEntreprisesTest extends TestCase
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
    public function it_gets_devises_monetaire_clients_entreprises()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(2)
            ->create([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ]);

        $response = $this->getJson(
            route(
                'api.devises-monetaires.clients-entreprises.index',
                $devisesMonetaire
            )
        );

        $response->assertOk()->assertSee($clientsEntreprises[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_devises_monetaire_clients_entreprises()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $data = ClientsEntreprise::factory()
            ->make([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.devises-monetaires.clients-entreprises.store',
                $devisesMonetaire
            ),
            $data
        );

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $clientsEntreprise = ClientsEntreprise::latest('id')->first();

        $this->assertEquals(
            $devisesMonetaire->id,
            $clientsEntreprise->devises_monetaire_id
        );
    }
}
