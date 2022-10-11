<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Banque;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueControllerTest extends TestCase
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
    public function it_displays_index_view_with_banques()
    {
        $banques = Banque::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('banques.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.banques.index')
            ->assertViewHas('banques');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_banque()
    {
        $response = $this->get(route('banques.create'));

        $response->assertOk()->assertViewIs('app.banques.create');
    }

    /**
     * @test
     */
    public function it_stores_the_banque()
    {
        $data = Banque::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('banques.store'), $data);

        $this->assertDatabaseHas('banques', $data);

        $banque = Banque::latest('id')->first();

        $response->assertRedirect(route('banques.edit', $banque));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_banque()
    {
        $banque = Banque::factory()->create();

        $response = $this->get(route('banques.show', $banque));

        $response
            ->assertOk()
            ->assertViewIs('app.banques.show')
            ->assertViewHas('banque');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_banque()
    {
        $banque = Banque::factory()->create();

        $response = $this->get(route('banques.edit', $banque));

        $response
            ->assertOk()
            ->assertViewIs('app.banques.edit')
            ->assertViewHas('banque');
    }

    /**
     * @test
     */
    public function it_updates_the_banque()
    {
        $banque = Banque::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(route('banques.update', $banque), $data);

        $data['id'] = $banque->id;

        $this->assertDatabaseHas('banques', $data);

        $response->assertRedirect(route('banques.edit', $banque));
    }

    /**
     * @test
     */
    public function it_deletes_the_banque()
    {
        $banque = Banque::factory()->create();

        $response = $this->delete(route('banques.destroy', $banque));

        $response->assertRedirect(route('banques.index'));

        $this->assertDeleted($banque);
    }
}
