<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ModelesFacture;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesFactureControllerTest extends TestCase
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
    public function it_displays_index_view_with_modeles_factures()
    {
        $modelesFactures = ModelesFacture::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('modeles-factures.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_factures.index')
            ->assertViewHas('modelesFactures');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_modeles_facture()
    {
        $response = $this->get(route('modeles-factures.create'));

        $response->assertOk()->assertViewIs('app.modeles_factures.create');
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_facture()
    {
        $data = ModelesFacture::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('modeles-factures.store'), $data);

        $this->assertDatabaseHas('modeles_factures', $data);

        $modelesFacture = ModelesFacture::latest('id')->first();

        $response->assertRedirect(
            route('modeles-factures.edit', $modelesFacture)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $response = $this->get(route('modeles-factures.show', $modelesFacture));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_factures.show')
            ->assertViewHas('modelesFacture');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $response = $this->get(route('modeles-factures.edit', $modelesFacture));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_factures.edit')
            ->assertViewHas('modelesFacture');
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->put(
            route('modeles-factures.update', $modelesFacture),
            $data
        );

        $data['id'] = $modelesFacture->id;

        $this->assertDatabaseHas('modeles_factures', $data);

        $response->assertRedirect(
            route('modeles-factures.edit', $modelesFacture)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $response = $this->delete(
            route('modeles-factures.destroy', $modelesFacture)
        );

        $response->assertRedirect(route('modeles-factures.index'));

        $this->assertDeleted($modelesFacture);
    }
}
