<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DepensesPanier;

use App\Models\Depense;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepensesPanierControllerTest extends TestCase
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
    public function it_displays_index_view_with_depenses_paniers()
    {
        $depensesPaniers = DepensesPanier::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('depenses-paniers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses_paniers.index')
            ->assertViewHas('depensesPaniers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_depenses_panier()
    {
        $response = $this->get(route('depenses-paniers.create'));

        $response->assertOk()->assertViewIs('app.depenses_paniers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_depenses_panier()
    {
        $data = DepensesPanier::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('depenses-paniers.store'), $data);

        $this->assertDatabaseHas('depenses_paniers', $data);

        $depensesPanier = DepensesPanier::latest('id')->first();

        $response->assertRedirect(
            route('depenses-paniers.edit', $depensesPanier)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $response = $this->get(route('depenses-paniers.show', $depensesPanier));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses_paniers.show')
            ->assertViewHas('depensesPanier');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $response = $this->get(route('depenses-paniers.edit', $depensesPanier));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses_paniers.edit')
            ->assertViewHas('depensesPanier');
    }

    /**
     * @test
     */
    public function it_updates_the_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $depense = Depense::factory()->create();

        $data = [
            'clients_entreprise_id' => $clientsEntreprise->id,
            'depense_id' => $depense->id,
        ];

        $response = $this->put(
            route('depenses-paniers.update', $depensesPanier),
            $data
        );

        $data['id'] = $depensesPanier->id;

        $this->assertDatabaseHas('depenses_paniers', $data);

        $response->assertRedirect(
            route('depenses-paniers.edit', $depensesPanier)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $response = $this->delete(
            route('depenses-paniers.destroy', $depensesPanier)
        );

        $response->assertRedirect(route('depenses-paniers.index'));

        $this->assertDeleted($depensesPanier);
    }
}
