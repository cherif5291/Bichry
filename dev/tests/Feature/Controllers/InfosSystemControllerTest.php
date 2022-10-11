<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\InfosSystem;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InfosSystemControllerTest extends TestCase
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
    public function it_displays_index_view_with_infos_systems()
    {
        $infosSystems = InfosSystem::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('infos-systems.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.infos_systems.index')
            ->assertViewHas('infosSystems');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_infos_system()
    {
        $response = $this->get(route('infos-systems.create'));

        $response->assertOk()->assertViewIs('app.infos_systems.create');
    }

    /**
     * @test
     */
    public function it_stores_the_infos_system()
    {
        $data = InfosSystem::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('infos-systems.store'), $data);

        $this->assertDatabaseHas('infos_systems', $data);

        $infosSystem = InfosSystem::latest('id')->first();

        $response->assertRedirect(route('infos-systems.edit', $infosSystem));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $response = $this->get(route('infos-systems.show', $infosSystem));

        $response
            ->assertOk()
            ->assertViewIs('app.infos_systems.show')
            ->assertViewHas('infosSystem');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $response = $this->get(route('infos-systems.edit', $infosSystem));

        $response
            ->assertOk()
            ->assertViewIs('app.infos_systems.edit')
            ->assertViewHas('infosSystem');
    }

    /**
     * @test
     */
    public function it_updates_the_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $data = [
            'nom_plateforme' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'website' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'email_contact' => $this->faker->email,
            'email_support' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('infos-systems.update', $infosSystem),
            $data
        );

        $data['id'] = $infosSystem->id;

        $this->assertDatabaseHas('infos_systems', $data);

        $response->assertRedirect(route('infos-systems.edit', $infosSystem));
    }

    /**
     * @test
     */
    public function it_deletes_the_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $response = $this->delete(route('infos-systems.destroy', $infosSystem));

        $response->assertRedirect(route('infos-systems.index'));

        $this->assertDeleted($infosSystem);
    }
}
