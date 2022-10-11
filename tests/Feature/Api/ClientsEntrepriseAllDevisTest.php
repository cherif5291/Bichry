<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Devis;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseAllDevisTest extends TestCase
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
    public function it_gets_clients_entreprise_all_devis()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $allDevis = Devis::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route('api.clients-entreprises.all-devis.index', $clientsEntreprise)
        );

        $response->assertOk()->assertSee($allDevis[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_all_devis()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = Devis::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.clients-entreprises.all-devis.store',
                $clientsEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('devis', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $devis = Devis::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $devis->clients_entreprise_id
        );
    }
}
