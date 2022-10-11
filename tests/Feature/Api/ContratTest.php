<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contrat;

use App\Models\Facture;
use App\Models\Project;
use App\Models\Entreprise;
use App\Models\Fournisseur;
use App\Models\ClientsEntreprise;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratTest extends TestCase
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
    public function it_gets_contrats_list()
    {
        $contrats = Contrat::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contrats.index'));

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_contrat()
    {
        $data = Contrat::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contrats.store'), $data);

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.contrats.update', $contrat),
            $data
        );

        $data['id'] = $contrat->id;

        $this->assertDatabaseHas('contrats', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contrat()
    {
        $contrat = Contrat::factory()->create();

        $response = $this->deleteJson(route('api.contrats.destroy', $contrat));

        $this->assertDeleted($contrat);

        $response->assertNoContent();
    }
}
