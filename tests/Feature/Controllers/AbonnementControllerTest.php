<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Abonnement;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AbonnementControllerTest extends TestCase
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
    public function it_displays_index_view_with_abonnements()
    {
        $abonnements = Abonnement::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('abonnements.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.abonnements.index')
            ->assertViewHas('abonnements');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_abonnement()
    {
        $response = $this->get(route('abonnements.create'));

        $response->assertOk()->assertViewIs('app.abonnements.create');
    }

    /**
     * @test
     */
    public function it_stores_the_abonnement()
    {
        $data = Abonnement::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('abonnements.store'), $data);

        $this->assertDatabaseHas('abonnements', $data);

        $abonnement = Abonnement::latest('id')->first();

        $response->assertRedirect(route('abonnements.edit', $abonnement));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $response = $this->get(route('abonnements.show', $abonnement));

        $response
            ->assertOk()
            ->assertViewIs('app.abonnements.show')
            ->assertViewHas('abonnement');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $response = $this->get(route('abonnements.edit', $abonnement));

        $response
            ->assertOk()
            ->assertViewIs('app.abonnements.edit')
            ->assertViewHas('abonnement');
    }

    /**
     * @test
     */
    public function it_updates_the_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'expiration' => $this->faker->date,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(route('abonnements.update', $abonnement), $data);

        $data['id'] = $abonnement->id;

        $this->assertDatabaseHas('abonnements', $data);

        $response->assertRedirect(route('abonnements.edit', $abonnement));
    }

    /**
     * @test
     */
    public function it_deletes_the_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $response = $this->delete(route('abonnements.destroy', $abonnement));

        $response->assertRedirect(route('abonnements.index'));

        $this->assertDeleted($abonnement);
    }
}
