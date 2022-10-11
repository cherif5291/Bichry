<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Fournisseur;

use App\Models\Entreprise;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FournisseurControllerTest extends TestCase
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
    public function it_displays_index_view_with_fournisseurs()
    {
        $fournisseurs = Fournisseur::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('fournisseurs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.fournisseurs.index')
            ->assertViewHas('fournisseurs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_fournisseur()
    {
        $response = $this->get(route('fournisseurs.create'));

        $response->assertOk()->assertViewIs('app.fournisseurs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_fournisseur()
    {
        $data = Fournisseur::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('fournisseurs.store'), $data);

        $this->assertDatabaseHas('fournisseurs', $data);

        $fournisseur = Fournisseur::latest('id')->first();

        $response->assertRedirect(route('fournisseurs.edit', $fournisseur));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_fournisseur()
    {
        $fournisseur = Fournisseur::factory()->create();

        $response = $this->get(route('fournisseurs.show', $fournisseur));

        $response
            ->assertOk()
            ->assertViewIs('app.fournisseurs.show')
            ->assertViewHas('fournisseur');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_fournisseur()
    {
        $fournisseur = Fournisseur::factory()->create();

        $response = $this->get(route('fournisseurs.edit', $fournisseur));

        $response
            ->assertOk()
            ->assertViewIs('app.fournisseurs.edit')
            ->assertViewHas('fournisseur');
    }

    /**
     * @test
     */
    public function it_updates_the_fournisseur()
    {
        $fournisseur = Fournisseur::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $paiementsModalite = PaiementsModalite::factory()->create();
        $comptescomptable = Comptescomptable::factory()->create();
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $entreprise = Entreprise::factory()->create();

        $data = [
            'prenom' => $this->faker->text(255),
            'nom' => $this->faker->text(255),
            'entreprise' => $this->faker->text(255),
            'nom_pro' => $this->faker->text(255),
            'nom_chequier' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'telecopie' => $this->faker->text(255),
            'website' => $this->faker->text(255),
            'titre' => $this->faker->text(255),
            'adresse' => $this->faker->text(255),
            'ville' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'code_postal' => $this->faker->text(255),
            'pays' => $this->faker->text(255),
            'note' => $this->faker->text,
            'numero_compte' => $this->faker->text(255),
            'solde_ouverture' => $this->faker->randomNumber(2),
            'date_ouverture' => $this->faker->date,
            'entreprise_id' => $entreprise->id,
            'paiements_modalite_id' => $paiementsModalite->id,
            'comptescomptable_id' => $comptescomptable->id,
            'devises_monetaire_id' => $devisesMonetaire->id,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(
            route('fournisseurs.update', $fournisseur),
            $data
        );

        $data['id'] = $fournisseur->id;

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertRedirect(route('fournisseurs.edit', $fournisseur));
    }

    /**
     * @test
     */
    public function it_deletes_the_fournisseur()
    {
        $fournisseur = Fournisseur::factory()->create();

        $response = $this->delete(route('fournisseurs.destroy', $fournisseur));

        $response->assertRedirect(route('fournisseurs.index'));

        $this->assertDeleted($fournisseur);
    }
}
