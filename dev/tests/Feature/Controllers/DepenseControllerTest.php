<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Depense;

use App\Models\Entreprise;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepenseControllerTest extends TestCase
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
    public function it_displays_index_view_with_depenses()
    {
        $depenses = Depense::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('depenses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses.index')
            ->assertViewHas('depenses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_depense()
    {
        $response = $this->get(route('depenses.create'));

        $response->assertOk()->assertViewIs('app.depenses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_depense()
    {
        $data = Depense::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('depenses.store'), $data);

        $this->assertDatabaseHas('depenses', $data);

        $depense = Depense::latest('id')->first();

        $response->assertRedirect(route('depenses.edit', $depense));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_depense()
    {
        $depense = Depense::factory()->create();

        $response = $this->get(route('depenses.show', $depense));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses.show')
            ->assertViewHas('depense');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_depense()
    {
        $depense = Depense::factory()->create();

        $response = $this->get(route('depenses.edit', $depense));

        $response
            ->assertOk()
            ->assertViewIs('app.depenses.edit')
            ->assertViewHas('depense');
    }

    /**
     * @test
     */
    public function it_updates_the_depense()
    {
        $depense = Depense::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();

        $data = [
            'reference' => $this->faker->randomNumber,
            'note' => $this->faker->text,
            'source' => $this->faker->text(255),
            'client_id' => $entreprise->id,
            'paiements_mode_id' => $paiementsMode->id,
        ];

        $response = $this->put(route('depenses.update', $depense), $data);

        $data['id'] = $depense->id;

        $this->assertDatabaseHas('depenses', $data);

        $response->assertRedirect(route('depenses.edit', $depense));
    }

    /**
     * @test
     */
    public function it_deletes_the_depense()
    {
        $depense = Depense::factory()->create();

        $response = $this->delete(route('depenses.destroy', $depense));

        $response->assertRedirect(route('depenses.index'));

        $this->assertDeleted($depense);
    }
}
