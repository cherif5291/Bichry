<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Habilitation;

use App\Models\Module;
use App\Models\Fonctionnalite;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HabilitationControllerTest extends TestCase
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
    public function it_displays_index_view_with_habilitations()
    {
        $habilitations = Habilitation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('habilitations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.habilitations.index')
            ->assertViewHas('habilitations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_habilitation()
    {
        $response = $this->get(route('habilitations.create'));

        $response->assertOk()->assertViewIs('app.habilitations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_habilitation()
    {
        $data = Habilitation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('habilitations.store'), $data);

        $this->assertDatabaseHas('habilitations', $data);

        $habilitation = Habilitation::latest('id')->first();

        $response->assertRedirect(route('habilitations.edit', $habilitation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $response = $this->get(route('habilitations.show', $habilitation));

        $response
            ->assertOk()
            ->assertViewIs('app.habilitations.show')
            ->assertViewHas('habilitation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $response = $this->get(route('habilitations.edit', $habilitation));

        $response
            ->assertOk()
            ->assertViewIs('app.habilitations.edit')
            ->assertViewHas('habilitation');
    }

    /**
     * @test
     */
    public function it_updates_the_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $user = User::factory()->create();
        $module = Module::factory()->create();
        $fonctionnalite = Fonctionnalite::factory()->create();

        $data = [
            'habilitation' => $this->faker->text,
            'user_id' => $user->id,
            'module_id' => $module->id,
            'fonctionnalite_id' => $fonctionnalite->id,
        ];

        $response = $this->put(
            route('habilitations.update', $habilitation),
            $data
        );

        $data['id'] = $habilitation->id;

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertRedirect(route('habilitations.edit', $habilitation));
    }

    /**
     * @test
     */
    public function it_deletes_the_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $response = $this->delete(
            route('habilitations.destroy', $habilitation)
        );

        $response->assertRedirect(route('habilitations.index'));

        $this->assertDeleted($habilitation);
    }
}
