<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Bonus;

use App\Models\Abonnement;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BonusControllerTest extends TestCase
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
    public function it_displays_index_view_with_bonuses()
    {
        $bonuses = Bonus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('bonuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.bonuses.index')
            ->assertViewHas('bonuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_bonus()
    {
        $response = $this->get(route('bonuses.create'));

        $response->assertOk()->assertViewIs('app.bonuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_bonus()
    {
        $data = Bonus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('bonuses.store'), $data);

        $this->assertDatabaseHas('bonuses', $data);

        $bonus = Bonus::latest('id')->first();

        $response->assertRedirect(route('bonuses.edit', $bonus));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_bonus()
    {
        $bonus = Bonus::factory()->create();

        $response = $this->get(route('bonuses.show', $bonus));

        $response
            ->assertOk()
            ->assertViewIs('app.bonuses.show')
            ->assertViewHas('bonus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_bonus()
    {
        $bonus = Bonus::factory()->create();

        $response = $this->get(route('bonuses.edit', $bonus));

        $response
            ->assertOk()
            ->assertViewIs('app.bonuses.edit')
            ->assertViewHas('bonus');
    }

    /**
     * @test
     */
    public function it_updates_the_bonus()
    {
        $bonus = Bonus::factory()->create();

        $abonnement = Abonnement::factory()->create();

        $data = [
            'type' => $this->faker->word,
            'duree' => $this->faker->date,
            'abonnement_id' => $abonnement->id,
        ];

        $response = $this->put(route('bonuses.update', $bonus), $data);

        $data['id'] = $bonus->id;

        $this->assertDatabaseHas('bonuses', $data);

        $response->assertRedirect(route('bonuses.edit', $bonus));
    }

    /**
     * @test
     */
    public function it_deletes_the_bonus()
    {
        $bonus = Bonus::factory()->create();

        $response = $this->delete(route('bonuses.destroy', $bonus));

        $response->assertRedirect(route('bonuses.index'));

        $this->assertDeleted($bonus);
    }
}
