<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisesMonetaireControllerTest extends TestCase
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
    public function it_displays_index_view_with_devises_monetaires()
    {
        $devisesMonetaires = DevisesMonetaire::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('devises-monetaires.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.devises_monetaires.index')
            ->assertViewHas('devisesMonetaires');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_devises_monetaire()
    {
        $response = $this->get(route('devises-monetaires.create'));

        $response->assertOk()->assertViewIs('app.devises_monetaires.create');
    }

    /**
     * @test
     */
    public function it_stores_the_devises_monetaire()
    {
        $data = DevisesMonetaire::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('devises-monetaires.store'), $data);

        $this->assertDatabaseHas('devises_monetaires', $data);

        $devisesMonetaire = DevisesMonetaire::latest('id')->first();

        $response->assertRedirect(
            route('devises-monetaires.edit', $devisesMonetaire)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $response = $this->get(
            route('devises-monetaires.show', $devisesMonetaire)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.devises_monetaires.show')
            ->assertViewHas('devisesMonetaire');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $response = $this->get(
            route('devises-monetaires.edit', $devisesMonetaire)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.devises_monetaires.edit')
            ->assertViewHas('devisesMonetaire');
    }

    /**
     * @test
     */
    public function it_updates_the_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'sigle' => $this->faker->text(255),
            'taux_echange' => $this->faker->randomNumber(2),
        ];

        $response = $this->put(
            route('devises-monetaires.update', $devisesMonetaire),
            $data
        );

        $data['id'] = $devisesMonetaire->id;

        $this->assertDatabaseHas('devises_monetaires', $data);

        $response->assertRedirect(
            route('devises-monetaires.edit', $devisesMonetaire)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $response = $this->delete(
            route('devises-monetaires.destroy', $devisesMonetaire)
        );

        $response->assertRedirect(route('devises-monetaires.index'));

        $this->assertDeleted($devisesMonetaire);
    }
}
