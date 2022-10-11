<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeControllerTest extends TestCase
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
    public function it_displays_index_view_with_paiements_modes()
    {
        $paiementsModes = PaiementsMode::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('paiements-modes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modes.index')
            ->assertViewHas('paiementsModes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_paiements_mode()
    {
        $response = $this->get(route('paiements-modes.create'));

        $response->assertOk()->assertViewIs('app.paiements_modes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode()
    {
        $data = PaiementsMode::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('paiements-modes.store'), $data);

        $this->assertDatabaseHas('paiements_modes', $data);

        $paiementsMode = PaiementsMode::latest('id')->first();

        $response->assertRedirect(
            route('paiements-modes.edit', $paiementsMode)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $response = $this->get(route('paiements-modes.show', $paiementsMode));

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modes.show')
            ->assertViewHas('paiementsMode');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $response = $this->get(route('paiements-modes.edit', $paiementsMode));

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modes.edit')
            ->assertViewHas('paiementsMode');
    }

    /**
     * @test
     */
    public function it_updates_the_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('paiements-modes.update', $paiementsMode),
            $data
        );

        $data['id'] = $paiementsMode->id;

        $this->assertDatabaseHas('paiements_modes', $data);

        $response->assertRedirect(
            route('paiements-modes.edit', $paiementsMode)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $response = $this->delete(
            route('paiements-modes.destroy', $paiementsMode)
        );

        $response->assertRedirect(route('paiements-modes.index'));

        $this->assertDeleted($paiementsMode);
    }
}
