<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Reglement;

use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Facture;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReglementControllerTest extends TestCase
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
    public function it_displays_index_view_with_reglements()
    {
        $reglements = Reglement::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reglements.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.reglements.index')
            ->assertViewHas('reglements');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_reglement()
    {
        $response = $this->get(route('reglements.create'));

        $response->assertOk()->assertViewIs('app.reglements.create');
    }

    /**
     * @test
     */
    public function it_stores_the_reglement()
    {
        $data = Reglement::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reglements.store'), $data);

        $this->assertDatabaseHas('reglements', $data);

        $reglement = Reglement::latest('id')->first();

        $response->assertRedirect(route('reglements.edit', $reglement));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_reglement()
    {
        $reglement = Reglement::factory()->create();

        $response = $this->get(route('reglements.show', $reglement));

        $response
            ->assertOk()
            ->assertViewIs('app.reglements.show')
            ->assertViewHas('reglement');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_reglement()
    {
        $reglement = Reglement::factory()->create();

        $response = $this->get(route('reglements.edit', $reglement));

        $response
            ->assertOk()
            ->assertViewIs('app.reglements.edit')
            ->assertViewHas('reglement');
    }

    /**
     * @test
     */
    public function it_updates_the_reglement()
    {
        $reglement = Reglement::factory()->create();

        $facture = Facture::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $banque = Banque::factory()->create();
        $caisse = Caisse::factory()->create();

        $data = [
            'reference' => $this->faker->text(255),
            'cc_cci' => $this->faker->text(255),
            'approvisionnememnt' => $this->faker->text(255),
            'montant_recu' => $this->faker->randomNumber(2),
            'note' => $this->faker->text,
            'facture_id' => $facture->id,
            'paiements_mode_id' => $paiementsMode->id,
            'clients_entreprise_id' => $clientsEntreprise->id,
            'banque_id' => $banque->id,
            'caisse_id' => $caisse->id,
        ];

        $response = $this->put(route('reglements.update', $reglement), $data);

        $data['id'] = $reglement->id;

        $this->assertDatabaseHas('reglements', $data);

        $response->assertRedirect(route('reglements.edit', $reglement));
    }

    /**
     * @test
     */
    public function it_deletes_the_reglement()
    {
        $reglement = Reglement::factory()->create();

        $response = $this->delete(route('reglements.destroy', $reglement));

        $response->assertRedirect(route('reglements.index'));

        $this->assertDeleted($reglement);
    }
}
