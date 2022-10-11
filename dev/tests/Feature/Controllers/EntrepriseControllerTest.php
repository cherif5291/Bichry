<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Entreprise;

use App\Models\ModelesRecu;
use App\Models\ModelesDevis;
use App\Models\ModelesFacture;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseControllerTest extends TestCase
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
    public function it_displays_index_view_with_entreprises()
    {
        $entreprises = Entreprise::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('entreprises.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.entreprises.index')
            ->assertViewHas('entreprises');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_entreprise()
    {
        $response = $this->get(route('entreprises.create'));

        $response->assertOk()->assertViewIs('app.entreprises.create');
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise()
    {
        $data = Entreprise::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('entreprises.store'), $data);

        $this->assertDatabaseHas('entreprises', $data);

        $entreprise = Entreprise::latest('id')->first();

        $response->assertRedirect(route('entreprises.edit', $entreprise));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $response = $this->get(route('entreprises.show', $entreprise));

        $response
            ->assertOk()
            ->assertViewIs('app.entreprises.show')
            ->assertViewHas('entreprise');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $response = $this->get(route('entreprises.edit', $entreprise));

        $response
            ->assertOk()
            ->assertViewIs('app.entreprises.edit')
            ->assertViewHas('entreprise');
    }

    /**
     * @test
     */
    public function it_updates_the_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $user = User::factory()->create();
        $modelesDevis = ModelesDevis::factory()->create();
        $modelesFacture = ModelesFacture::factory()->create();
        $modelesRecu = ModelesRecu::factory()->create();
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom_entreprise' => $this->faker->text(255),
            'a_propos' => $this->faker->text,
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'adresse' => $this->faker->text,
            'capital' => $this->faker->randomNumber(2),
            'couleur_primaire' => $this->faker->text(255),
            'couleur_secondaire' => $this->faker->text(255),
            'user_id' => $user->id,
            'modeles_devis_id' => $modelesDevis->id,
            'modeles_facture_id' => $modelesFacture->id,
            'modeles_recu_id' => $modelesRecu->id,
            'devises_monetaire_id' => $devisesMonetaire->id,
        ];

        $response = $this->put(route('entreprises.update', $entreprise), $data);

        $data['id'] = $entreprise->id;

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertRedirect(route('entreprises.edit', $entreprise));
    }

    /**
     * @test
     */
    public function it_deletes_the_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $response = $this->delete(route('entreprises.destroy', $entreprise));

        $response->assertRedirect(route('entreprises.index'));

        $this->assertDeleted($entreprise);
    }
}
