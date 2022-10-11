<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Caisse;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseControllerTest extends TestCase
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
    public function it_displays_index_view_with_caisses()
    {
        $caisses = Caisse::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('caisses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.index')
            ->assertViewHas('caisses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_caisse()
    {
        $response = $this->get(route('caisses.create'));

        $response->assertOk()->assertViewIs('app.caisses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_caisse()
    {
        $data = Caisse::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('caisses.store'), $data);

        $this->assertDatabaseHas('caisses', $data);

        $caisse = Caisse::latest('id')->first();

        $response->assertRedirect(route('caisses.edit', $caisse));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_caisse()
    {
        $caisse = Caisse::factory()->create();

        $response = $this->get(route('caisses.show', $caisse));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.show')
            ->assertViewHas('caisse');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_caisse()
    {
        $caisse = Caisse::factory()->create();

        $response = $this->get(route('caisses.edit', $caisse));

        $response
            ->assertOk()
            ->assertViewIs('app.caisses.edit')
            ->assertViewHas('caisse');
    }

    /**
     * @test
     */
    public function it_updates_the_caisse()
    {
        $caisse = Caisse::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'solde' => $this->faker->randomNumber(2),
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(route('caisses.update', $caisse), $data);

        $data['id'] = $caisse->id;

        $this->assertDatabaseHas('caisses', $data);

        $response->assertRedirect(route('caisses.edit', $caisse));
    }

    /**
     * @test
     */
    public function it_deletes_the_caisse()
    {
        $caisse = Caisse::factory()->create();

        $response = $this->delete(route('caisses.destroy', $caisse));

        $response->assertRedirect(route('caisses.index'));

        $this->assertDeleted($caisse);
    }
}
