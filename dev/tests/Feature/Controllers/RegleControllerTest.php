<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Regle;

use App\Models\Banque;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegleControllerTest extends TestCase
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
    public function it_displays_index_view_with_regles()
    {
        $regles = Regle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('regles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.regles.index')
            ->assertViewHas('regles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_regle()
    {
        $response = $this->get(route('regles.create'));

        $response->assertOk()->assertViewIs('app.regles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_regle()
    {
        $data = Regle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('regles.store'), $data);

        $this->assertDatabaseHas('regles', $data);

        $regle = Regle::latest('id')->first();

        $response->assertRedirect(route('regles.edit', $regle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_regle()
    {
        $regle = Regle::factory()->create();

        $response = $this->get(route('regles.show', $regle));

        $response
            ->assertOk()
            ->assertViewIs('app.regles.show')
            ->assertViewHas('regle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_regle()
    {
        $regle = Regle::factory()->create();

        $response = $this->get(route('regles.edit', $regle));

        $response
            ->assertOk()
            ->assertViewIs('app.regles.edit')
            ->assertViewHas('regle');
    }

    /**
     * @test
     */
    public function it_updates_the_regle()
    {
        $regle = Regle::factory()->create();

        $banque = Banque::factory()->create();

        $data = [
            'motif' => $this->faker->text(255),
            'montant' => $this->faker->randomNumber(2),
            'banque_id' => $banque->id,
        ];

        $response = $this->put(route('regles.update', $regle), $data);

        $data['id'] = $regle->id;

        $this->assertDatabaseHas('regles', $data);

        $response->assertRedirect(route('regles.edit', $regle));
    }

    /**
     * @test
     */
    public function it_deletes_the_regle()
    {
        $regle = Regle::factory()->create();

        $response = $this->delete(route('regles.destroy', $regle));

        $response->assertRedirect(route('regles.index'));

        $this->assertDeleted($regle);
    }
}
