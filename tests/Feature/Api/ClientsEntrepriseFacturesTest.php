<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseFacturesTest extends TestCase
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
    public function it_gets_clients_entreprise_factures()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $factures = Facture::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route('api.clients-entreprises.factures.index', $clientsEntreprise)
        );

        $response->assertOk()->assertSee($factures[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_factures()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = Facture::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.clients-entreprises.factures.store', $clientsEntreprise),
            $data
        );

        $this->assertDatabaseHas('factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facture = Facture::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $facture->clients_entreprise_id
        );
    }
}
