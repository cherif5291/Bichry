<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Comptescomptable;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComptescomptableControllerTest extends TestCase
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
    public function it_displays_index_view_with_comptescomptables()
    {
        $comptescomptables = Comptescomptable::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('comptescomptables.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.comptescomptables.index')
            ->assertViewHas('comptescomptables');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_comptescomptable()
    {
        $response = $this->get(route('comptescomptables.create'));

        $response->assertOk()->assertViewIs('app.comptescomptables.create');
    }

    /**
     * @test
     */
    public function it_stores_the_comptescomptable()
    {
        $data = Comptescomptable::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('comptescomptables.store'), $data);

        $this->assertDatabaseHas('comptescomptables', $data);

        $comptescomptable = Comptescomptable::latest('id')->first();

        $response->assertRedirect(
            route('comptescomptables.edit', $comptescomptable)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $response = $this->get(
            route('comptescomptables.show', $comptescomptable)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.comptescomptables.show')
            ->assertViewHas('comptescomptable');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $response = $this->get(
            route('comptescomptables.edit', $comptescomptable)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.comptescomptables.edit')
            ->assertViewHas('comptescomptable');
    }

    /**
     * @test
     */
    public function it_updates_the_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text(255),
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(
            route('comptescomptables.update', $comptescomptable),
            $data
        );

        $data['id'] = $comptescomptable->id;

        $this->assertDatabaseHas('comptescomptables', $data);

        $response->assertRedirect(
            route('comptescomptables.edit', $comptescomptable)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $response = $this->delete(
            route('comptescomptables.destroy', $comptescomptable)
        );

        $response->assertRedirect(route('comptescomptables.index'));

        $this->assertDeleted($comptescomptable);
    }
}
