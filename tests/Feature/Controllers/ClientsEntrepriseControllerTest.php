<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ClientsEntreprise;

use App\Models\Entreprise;
use App\Models\PaiementsMode;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseControllerTest extends TestCase
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
    public function it_displays_index_view_with_clients_entreprises()
    {
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('clients-entreprises.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.clients_entreprises.index')
            ->assertViewHas('clientsEntreprises');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_clients_entreprise()
    {
        $response = $this->get(route('clients-entreprises.create'));

        $response->assertOk()->assertViewIs('app.clients_entreprises.create');
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise()
    {
        $data = ClientsEntreprise::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('clients-entreprises.store'), $data);

        $this->assertDatabaseHas('clients_entreprises', $data);

        $clientsEntreprise = ClientsEntreprise::latest('id')->first();

        $response->assertRedirect(
            route('clients-entreprises.edit', $clientsEntreprise)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $response = $this->get(
            route('clients-entreprises.show', $clientsEntreprise)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.clients_entreprises.show')
            ->assertViewHas('clientsEntreprise');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $response = $this->get(
            route('clients-entreprises.edit', $clientsEntreprise)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.clients_entreprises.edit')
            ->assertViewHas('clientsEntreprise');
    }

    /**
     * @test
     */
    public function it_updates_the_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();
        $paiementsModalite = PaiementsModalite::factory()->create();
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'prenom' => $this->faker->text(255),
            'entreprise' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text,
            'portable' => $this->faker->text,
            'nom_pro' => $this->faker->text(255),
            'nom_chequier' => $this->faker->text(255),
            'titre' => $this->faker->text(255),
            'telecopie' => $this->faker->text(255),
            'website' => $this->faker->text(255),
            'adresse' => $this->faker->text,
            'ville' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'code_postale' => $this->faker->text(255),
            'pays' => $this->faker->text(255),
            'note' => $this->faker->text,
            'entreprise_id' => $entreprise->id,
            'paiements_mode_id' => $paiementsMode->id,
            'paiements_modalite_id' => $paiementsModalite->id,
            'devises_monetaire_id' => $devisesMonetaire->id,
        ];

        $response = $this->put(
            route('clients-entreprises.update', $clientsEntreprise),
            $data
        );

        $data['id'] = $clientsEntreprise->id;

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertRedirect(
            route('clients-entreprises.edit', $clientsEntreprise)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $response = $this->delete(
            route('clients-entreprises.destroy', $clientsEntreprise)
        );

        $response->assertRedirect(route('clients-entreprises.index'));

        $this->assertDeleted($clientsEntreprise);
    }
}
