<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Facture;

use App\Models\Fournisseur;
use App\Models\FacturesArticle;
use App\Models\ClientsEntreprise;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactureControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_factures()
    {
        $factures = Facture::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('factures.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.factures.index')
            ->assertViewHas('factures');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_facture()
    {
        $response = $this->get(route('factures.create'));

        $response->assertOk()->assertViewIs('app.factures.create');
    }

    /**
     * @test
     */
    public function it_stores_the_facture()
    {
        $data = Facture::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('factures.store'), $data);

        $this->assertDatabaseHas('factures', $data);

        $facture = Facture::latest('id')->first();

        $response->assertRedirect(route('factures.edit', $facture));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->get(route('factures.show', $facture));

        $response
            ->assertOk()
            ->assertViewIs('app.factures.show')
            ->assertViewHas('facture');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->get(route('factures.edit', $facture));

        $response
            ->assertOk()
            ->assertViewIs('app.factures.edit')
            ->assertViewHas('facture');
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

        $response = $this->put(route('factures.update', $facture), $data);

        $data['id'] = $facture->id;

        $this->assertDatabaseHas('factures', $data);

        $response->assertRedirect(route('factures.edit', $facture));
    }

    /**
     * @test
     */
    public function it_deletes_the_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->delete(route('factures.destroy', $facture));

        $response->assertRedirect(route('factures.index'));

        $this->assertDeleted($facture);
    }
}
