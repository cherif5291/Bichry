<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Revenu;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RevenuControllerTest extends TestCase
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
    public function it_displays_index_view_with_revenus()
    {
        $revenus = Revenu::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('revenus.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.revenus.index')
            ->assertViewHas('revenus');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_revenu()
    {
        $response = $this->get(route('revenus.create'));

        $response->assertOk()->assertViewIs('app.revenus.create');
    }

    /**
     * @test
     */
    public function it_stores_the_revenu()
    {
        $data = Revenu::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('revenus.store'), $data);

        $this->assertDatabaseHas('revenus', $data);

        $revenu = Revenu::latest('id')->first();

        $response->assertRedirect(route('revenus.edit', $revenu));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_revenu()
    {
        $revenu = Revenu::factory()->create();

        $response = $this->get(route('revenus.show', $revenu));

        $response
            ->assertOk()
            ->assertViewIs('app.revenus.show')
            ->assertViewHas('revenu');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_revenu()
    {
        $revenu = Revenu::factory()->create();

        $response = $this->get(route('revenus.edit', $revenu));

        $response
            ->assertOk()
            ->assertViewIs('app.revenus.edit')
            ->assertViewHas('revenu');
    }

    /**
     * @test
     */
    public function it_updates_the_revenu()
    {
        $revenu = Revenu::factory()->create();

        $data = [];

        $response = $this->put(route('revenus.update', $revenu), $data);

        $data['id'] = $revenu->id;

        $this->assertDatabaseHas('revenus', $data);

        $response->assertRedirect(route('revenus.edit', $revenu));
    }

    /**
     * @test
     */
    public function it_deletes_the_revenu()
    {
        $revenu = Revenu::factory()->create();

        $response = $this->delete(route('revenus.destroy', $revenu));

        $response->assertRedirect(route('revenus.index'));

        $this->assertDeleted($revenu);
    }
}
