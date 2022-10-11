<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Rupture;

use App\Models\Invitation;
use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RuptureControllerTest extends TestCase
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
    public function it_displays_index_view_with_ruptures()
    {
        $ruptures = Rupture::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ruptures.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ruptures.index')
            ->assertViewHas('ruptures');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rupture()
    {
        $response = $this->get(route('ruptures.create'));

        $response->assertOk()->assertViewIs('app.ruptures.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rupture()
    {
        $data = Rupture::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ruptures.store'), $data);

        $this->assertDatabaseHas('ruptures', $data);

        $rupture = Rupture::latest('id')->first();

        $response->assertRedirect(route('ruptures.edit', $rupture));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rupture()
    {
        $rupture = Rupture::factory()->create();

        $response = $this->get(route('ruptures.show', $rupture));

        $response
            ->assertOk()
            ->assertViewIs('app.ruptures.show')
            ->assertViewHas('rupture');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rupture()
    {
        $rupture = Rupture::factory()->create();

        $response = $this->get(route('ruptures.edit', $rupture));

        $response
            ->assertOk()
            ->assertViewIs('app.ruptures.edit')
            ->assertViewHas('rupture');
    }

    /**
     * @test
     */
    public function it_updates_the_rupture()
    {
        $rupture = Rupture::factory()->create();

        $invitation = Invitation::factory()->create();
        $entreprise = Entreprise::factory()->create();

        $data = [
            'status' => $this->faker->word,
            'invitation_id' => $invitation->id,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(route('ruptures.update', $rupture), $data);

        $data['id'] = $rupture->id;

        $this->assertDatabaseHas('ruptures', $data);

        $response->assertRedirect(route('ruptures.edit', $rupture));
    }

    /**
     * @test
     */
    public function it_deletes_the_rupture()
    {
        $rupture = Rupture::factory()->create();

        $response = $this->delete(route('ruptures.destroy', $rupture));

        $response->assertRedirect(route('ruptures.index'));

        $this->assertDeleted($rupture);
    }
}
