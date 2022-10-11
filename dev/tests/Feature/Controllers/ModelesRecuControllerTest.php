<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ModelesRecu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesRecuControllerTest extends TestCase
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
    public function it_displays_index_view_with_modeles_recus()
    {
        $modelesRecus = ModelesRecu::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('modeles-recus.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_recus.index')
            ->assertViewHas('modelesRecus');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_modeles_recu()
    {
        $response = $this->get(route('modeles-recus.create'));

        $response->assertOk()->assertViewIs('app.modeles_recus.create');
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_recu()
    {
        $data = ModelesRecu::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('modeles-recus.store'), $data);

        $this->assertDatabaseHas('modeles_recus', $data);

        $modelesRecu = ModelesRecu::latest('id')->first();

        $response->assertRedirect(route('modeles-recus.edit', $modelesRecu));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $response = $this->get(route('modeles-recus.show', $modelesRecu));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_recus.show')
            ->assertViewHas('modelesRecu');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $response = $this->get(route('modeles-recus.edit', $modelesRecu));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles_recus.edit')
            ->assertViewHas('modelesRecu');
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->put(
            route('modeles-recus.update', $modelesRecu),
            $data
        );

        $data['id'] = $modelesRecu->id;

        $this->assertDatabaseHas('modeles_recus', $data);

        $response->assertRedirect(route('modeles-recus.edit', $modelesRecu));
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $response = $this->delete(route('modeles-recus.destroy', $modelesRecu));

        $response->assertRedirect(route('modeles-recus.index'));

        $this->assertDeleted($modelesRecu);
    }
}
