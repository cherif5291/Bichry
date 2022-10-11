<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Fonctionnalite;

use App\Models\Module;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FonctionnaliteControllerTest extends TestCase
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
    public function it_displays_index_view_with_fonctionnalites()
    {
        $fonctionnalites = Fonctionnalite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('fonctionnalites.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.fonctionnalites.index')
            ->assertViewHas('fonctionnalites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_fonctionnalite()
    {
        $response = $this->get(route('fonctionnalites.create'));

        $response->assertOk()->assertViewIs('app.fonctionnalites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_fonctionnalite()
    {
        $data = Fonctionnalite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('fonctionnalites.store'), $data);

        $this->assertDatabaseHas('fonctionnalites', $data);

        $fonctionnalite = Fonctionnalite::latest('id')->first();

        $response->assertRedirect(
            route('fonctionnalites.edit', $fonctionnalite)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $response = $this->get(route('fonctionnalites.show', $fonctionnalite));

        $response
            ->assertOk()
            ->assertViewIs('app.fonctionnalites.show')
            ->assertViewHas('fonctionnalite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $response = $this->get(route('fonctionnalites.edit', $fonctionnalite));

        $response
            ->assertOk()
            ->assertViewIs('app.fonctionnalites.edit')
            ->assertViewHas('fonctionnalite');
    }

    /**
     * @test
     */
    public function it_updates_the_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $module = Module::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'voir' => $this->faker->text(255),
            'ajouter' => $this->faker->text(255),
            'supprimer' => $this->faker->text(255),
            'modifier' => $this->faker->text(255),
            'exporter' => $this->faker->text(255),
            'module_id' => $module->id,
        ];

        $response = $this->put(
            route('fonctionnalites.update', $fonctionnalite),
            $data
        );

        $data['id'] = $fonctionnalite->id;

        $this->assertDatabaseHas('fonctionnalites', $data);

        $response->assertRedirect(
            route('fonctionnalites.edit', $fonctionnalite)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $response = $this->delete(
            route('fonctionnalites.destroy', $fonctionnalite)
        );

        $response->assertRedirect(route('fonctionnalites.index'));

        $this->assertDeleted($fonctionnalite);
    }
}
