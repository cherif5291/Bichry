<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PaiementsModalite;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModaliteControllerTest extends TestCase
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
    public function it_displays_index_view_with_paiements_modalites()
    {
        $paiementsModalites = PaiementsModalite::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('paiements-modalites.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modalites.index')
            ->assertViewHas('paiementsModalites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_paiements_modalite()
    {
        $response = $this->get(route('paiements-modalites.create'));

        $response->assertOk()->assertViewIs('app.paiements_modalites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_modalite()
    {
        $data = PaiementsModalite::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('paiements-modalites.store'), $data);

        $this->assertDatabaseHas('paiements_modalites', $data);

        $paiementsModalite = PaiementsModalite::latest('id')->first();

        $response->assertRedirect(
            route('paiements-modalites.edit', $paiementsModalite)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $response = $this->get(
            route('paiements-modalites.show', $paiementsModalite)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modalites.show')
            ->assertViewHas('paiementsModalite');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $response = $this->get(
            route('paiements-modalites.edit', $paiementsModalite)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.paiements_modalites.edit')
            ->assertViewHas('paiementsModalite');
    }

    /**
     * @test
     */
    public function it_updates_the_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(
            route('paiements-modalites.update', $paiementsModalite),
            $data
        );

        $data['id'] = $paiementsModalite->id;

        $this->assertDatabaseHas('paiements_modalites', $data);

        $response->assertRedirect(
            route('paiements-modalites.edit', $paiementsModalite)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $response = $this->delete(
            route('paiements-modalites.destroy', $paiementsModalite)
        );

        $response->assertRedirect(route('paiements-modalites.index'));

        $this->assertDeleted($paiementsModalite);
    }
}
