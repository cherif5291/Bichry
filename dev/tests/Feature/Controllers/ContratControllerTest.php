<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Contrat;

use App\Models\Facture;
use App\Models\Project;
use App\Models\Entreprise;
use App\Models\Fournisseur;
use App\Models\ClientsEntreprise;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratControllerTest extends TestCase
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
    public function it_displays_index_view_with_contrats()
    {
        $contrats = Contrat::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('contrats.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats.index')
            ->assertViewHas('contrats');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_contrat()
    {
        $response = $this->get(route('contrats.create'));

        $response->assertOk()->assertViewIs('app.contrats.create');
    }

    /**
     * @test
     */
    public function it_stores_the_contrat()
    {
        $data = Contrat::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('contrats.store'), $data);

        $this->assertDatabaseHas('contrats', $data);

        $contrat = Contrat::latest('id')->first();

        $response->assertRedirect(route('contrats.edit', $contrat));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_contrat()
    {
        $contrat = Contrat::factory()->create();

        $response = $this->get(route('contrats.show', $contrat));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats.show')
            ->assertViewHas('contrat');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_contrat()
    {
        $contrat = Contrat::factory()->create();

        $response = $this->get(route('contrats.edit', $contrat));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats.edit')
            ->assertViewHas('contrat');
    }

    /**
     * @test
     */
    public function it_updates_the_contrat()
    {
        $contrat = Contrat::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $facture = Facture::factory()->create();
        $project = Project::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        $data = [
            'status' => $this->faker->word,
            'entreprise_id' => $entreprise->id,
            'clients_entreprise_id' => $clientsEntreprise->id,
            'employes_entreprise_id' => $employesEntreprise->id,
            'facture_id' => $facture->id,
            'project_id' => $project->id,
            'fournisseur_id' => $fournisseur->id,
        ];

        $response = $this->put(route('contrats.update', $contrat), $data);

        $data['id'] = $contrat->id;

        $this->assertDatabaseHas('contrats', $data);

        $response->assertRedirect(route('contrats.edit', $contrat));
    }

    /**
     * @test
     */
    public function it_deletes_the_contrat()
    {
        $contrat = Contrat::factory()->create();

        $response = $this->delete(route('contrats.destroy', $contrat));

        $response->assertRedirect(route('contrats.index'));

        $this->assertDeleted($contrat);
    }
}
