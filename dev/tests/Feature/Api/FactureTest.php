<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;

use App\Models\Fournisseur;
use App\Models\FacturesArticle;
use App\Models\ClientsEntreprise;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactureTest extends TestCase
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
    public function it_gets_factures_list()
    {
        $factures = Facture::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.factures.index'));

        $response->assertOk()->assertSee($factures[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_facture()
    {
        $data = Facture::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.factures.store'), $data);

        $this->assertDatabaseHas('factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_facture()
    {
        $facture = Facture::factory()->create();

        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $paiementsModalite = PaiementsModalite::factory()->create();
        $facturesArticle = FacturesArticle::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        $data = [
            'cc_cci' => $this->faker->text,
            'echeance' => $this->faker->date,
            'adresse_facturation' => $this->faker->text,
            'numero_facture' => $this->faker->randomNumber,
            'messsage' => $this->faker->text,
            'message_affiche' => $this->faker->text,
            'has_taxe' => $this->faker->text(255),
            'type' => $this->faker->text(255),
            'clients_entreprise_id' => $clientsEntreprise->id,
            'paiements_modalite_id' => $paiementsModalite->id,
            'factures_article_id' => $facturesArticle->id,
            'fournisseur_id' => $fournisseur->id,
        ];

        $response = $this->putJson(
            route('api.factures.update', $facture),
            $data
        );

        $data['id'] = $facture->id;

        $this->assertDatabaseHas('factures', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->deleteJson(route('api.factures.destroy', $facture));

        $this->assertDeleted($facture);

        $response->assertNoContent();
    }
}
