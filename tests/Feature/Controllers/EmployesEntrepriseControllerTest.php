<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EmployesEntreprise;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployesEntrepriseControllerTest extends TestCase
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
    public function it_displays_index_view_with_employes_entreprises()
    {
        $employesEntreprises = EmployesEntreprise::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('employes-entreprises.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.employes_entreprises.index')
            ->assertViewHas('employesEntreprises');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_employes_entreprise()
    {
        $response = $this->get(route('employes-entreprises.create'));

        $response->assertOk()->assertViewIs('app.employes_entreprises.create');
    }

    /**
     * @test
     */
    public function it_stores_the_employes_entreprise()
    {
        $data = EmployesEntreprise::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('employes-entreprises.store'), $data);

        $this->assertDatabaseHas('employes_entreprises', $data);

        $employesEntreprise = EmployesEntreprise::latest('id')->first();

        $response->assertRedirect(
            route('employes-entreprises.edit', $employesEntreprise)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $response = $this->get(
            route('employes-entreprises.show', $employesEntreprise)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.employes_entreprises.show')
            ->assertViewHas('employesEntreprise');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $response = $this->get(
            route('employes-entreprises.edit', $employesEntreprise)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.employes_entreprises.edit')
            ->assertViewHas('employesEntreprise');
    }

    /**
     * @test
     */
    public function it_updates_the_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $user = User::factory()->create();

        $data = [
            'prenom' => $this->faker->text(255),
            'nom' => $this->faker->text(255),
            'initial' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'data_embauche' => $this->faker->date,
            'interval_paiement' => $this->faker->text(255),
            'duree_interval' => $this->faker->randomNumber(0),
            'remuneration' => $this->faker->randomNumber(2),
            'entreprise_id' => $entreprise->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('employes-entreprises.update', $employesEntreprise),
            $data
        );

        $data['id'] = $employesEntreprise->id;

        $this->assertDatabaseHas('employes_entreprises', $data);

        $response->assertRedirect(
            route('employes-entreprises.edit', $employesEntreprise)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $response = $this->delete(
            route('employes-entreprises.destroy', $employesEntreprise)
        );

        $response->assertRedirect(route('employes-entreprises.index'));

        $this->assertDeleted($employesEntreprise);
    }
}
