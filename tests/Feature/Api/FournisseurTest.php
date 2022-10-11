<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fournisseur;

use App\Models\Entreprise;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FournisseurTest extends TestCase
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
    public function it_gets_fournisseurs_list()
    {
        $fournisseurs = Fournisseur::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.fournisseurs.index'));

        $response->assertOk()->assertSee($fournisseurs[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_fournisseur()
    {
        $data = Fournisseur::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.fournisseurs.store'), $data);

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.fournisseurs.update', $fournisseur),
            $data
        );

        $data['id'] = $fournisseur->id;

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_fournisseur()
    {
        $fournisseur = Fournisseur::factory()->create();

        $response = $this->deleteJson(
            route('api.fournisseurs.destroy', $fournisseur)
        );

        $this->assertDeleted($fournisseur);

        $response->assertNoContent();
    }
}
