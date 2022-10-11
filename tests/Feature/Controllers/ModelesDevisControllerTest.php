<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ModelesDevis;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesDevisControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_modeles_devis()
    {
        $allModelesDevis = ModelesDevis::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-modeles-devis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_modeles_devis.index')
            ->assertViewHas('allModelesDevis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_modeles_devis()
    {
        $response = $this->get(route('all-modeles-devis.create'));

        $response->assertOk()->assertViewIs('app.all_modeles_devis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_devis()
    {
        $data = ModelesDevis::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-modeles-devis.store'), $data);

        $this->assertDatabaseHas('modeles_devis', $data);

        $modelesDevis = ModelesDevis::latest('id')->first();

        $response->assertRedirect(
            route('all-modeles-devis.edit', $modelesDevis)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $response = $this->get(route('all-modeles-devis.show', $modelesDevis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_modeles_devis.show')
            ->assertViewHas('modelesDevis');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $response = $this->get(route('all-modeles-devis.edit', $modelesDevis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_modeles_devis.edit')
            ->assertViewHas('modelesDevis');
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->put(
            route('all-modeles-devis.update', $modelesDevis),
            $data
        );

        $data['id'] = $modelesDevis->id;

        $this->assertDatabaseHas('modeles_devis', $data);

        $response->assertRedirect(
            route('all-modeles-devis.edit', $modelesDevis)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $response = $this->delete(
            route('all-modeles-devis.destroy', $modelesDevis)
        );

        $response->assertRedirect(route('all-modeles-devis.index'));

        $this->assertDeleted($modelesDevis);
    }
}
