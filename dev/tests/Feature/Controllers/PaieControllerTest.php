<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Paie;

use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaieControllerTest extends TestCase
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
    public function it_displays_index_view_with_paies()
    {
        $paies = Paie::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('paies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.paies.index')
            ->assertViewHas('paies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_paie()
    {
        $response = $this->get(route('paies.create'));

        $response->assertOk()->assertViewIs('app.paies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_paie()
    {
        $data = Paie::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('paies.store'), $data);

        $this->assertDatabaseHas('paies', $data);

        $paie = Paie::latest('id')->first();

        $response->assertRedirect(route('paies.edit', $paie));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_paie()
    {
        $paie = Paie::factory()->create();

        $response = $this->get(route('paies.show', $paie));

        $response
            ->assertOk()
            ->assertViewIs('app.paies.show')
            ->assertViewHas('paie');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_paie()
    {
        $paie = Paie::factory()->create();

        $response = $this->get(route('paies.edit', $paie));

        $response
            ->assertOk()
            ->assertViewIs('app.paies.edit')
            ->assertViewHas('paie');
    }

    /**
     * @test
     */
    public function it_updates_the_paie()
    {
        $paie = Paie::factory()->create();

        $employesEntreprise = EmployesEntreprise::factory()->create();

        $data = [
            'date' => $this->faker->date,
            'montant_paye' => $this->faker->randomNumber(2),
            'restant' => $this->faker->randomNumber(2),
            'employes_entreprise_id' => $employesEntreprise->id,
        ];

        $response = $this->put(route('paies.update', $paie), $data);

        $data['id'] = $paie->id;

        $this->assertDatabaseHas('paies', $data);

        $response->assertRedirect(route('paies.edit', $paie));
    }

    /**
     * @test
     */
    public function it_deletes_the_paie()
    {
        $paie = Paie::factory()->create();

        $response = $this->delete(route('paies.destroy', $paie));

        $response->assertRedirect(route('paies.index'));

        $this->assertDeleted($paie);
    }
}
