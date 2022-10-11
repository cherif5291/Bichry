<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Impot;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImpotControllerTest extends TestCase
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
    public function it_displays_index_view_with_impots()
    {
        $impots = Impot::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('impots.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.impots.index')
            ->assertViewHas('impots');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_impot()
    {
        $response = $this->get(route('impots.create'));

        $response->assertOk()->assertViewIs('app.impots.create');
    }

    /**
     * @test
     */
    public function it_stores_the_impot()
    {
        $data = Impot::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('impots.store'), $data);

        $this->assertDatabaseHas('impots', $data);

        $impot = Impot::latest('id')->first();

        $response->assertRedirect(route('impots.edit', $impot));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_impot()
    {
        $impot = Impot::factory()->create();

        $response = $this->get(route('impots.show', $impot));

        $response
            ->assertOk()
            ->assertViewIs('app.impots.show')
            ->assertViewHas('impot');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_impot()
    {
        $impot = Impot::factory()->create();

        $response = $this->get(route('impots.edit', $impot));

        $response
            ->assertOk()
            ->assertViewIs('app.impots.edit')
            ->assertViewHas('impot');
    }

    /**
     * @test
     */
    public function it_updates_the_impot()
    {
        $impot = Impot::factory()->create();

        $data = [];

        $response = $this->put(route('impots.update', $impot), $data);

        $data['id'] = $impot->id;

        $this->assertDatabaseHas('impots', $data);

        $response->assertRedirect(route('impots.edit', $impot));
    }

    /**
     * @test
     */
    public function it_deletes_the_impot()
    {
        $impot = Impot::factory()->create();

        $response = $this->delete(route('impots.destroy', $impot));

        $response->assertRedirect(route('impots.index'));

        $this->assertDeleted($impot);
    }
}
