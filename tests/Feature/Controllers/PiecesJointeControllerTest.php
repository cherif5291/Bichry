<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PiecesJointe;

use App\Models\Devis;
use App\Models\Revenu;
use App\Models\Facture;
use App\Models\Depense;
use App\Models\Reglement;
use App\Models\RecusVente;
use App\Models\Entreprise;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PiecesJointeControllerTest extends TestCase
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
    public function it_displays_index_view_with_pieces_jointes()
    {
        $piecesJointes = PiecesJointe::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pieces-jointes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces_jointes.index')
            ->assertViewHas('piecesJointes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pieces_jointe()
    {
        $response = $this->get(route('pieces-jointes.create'));

        $response->assertOk()->assertViewIs('app.pieces_jointes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pieces_jointe()
    {
        $data = PiecesJointe::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pieces-jointes.store'), $data);

        unset($data['recus_vente_id']);
        unset($data['clients_entreprise_id']);
        unset($data['devis_id']);
        unset($data['facture_id']);
        unset($data['reglement_id']);
        unset($data['depense_id']);
        unset($data['revenu_id']);
        unset($data['entreprise_id']);

        $this->assertDatabaseHas('pieces_jointes', $data);

        $piecesJointe = PiecesJointe::latest('id')->first();

        $response->assertRedirect(route('pieces-jointes.edit', $piecesJointe));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pieces_jointe()
    {
        $piecesJointe = PiecesJointe::factory()->create();

        $response = $this->get(route('pieces-jointes.show', $piecesJointe));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces_jointes.show')
            ->assertViewHas('piecesJointe');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pieces_jointe()
    {
        $piecesJointe = PiecesJointe::factory()->create();

        $response = $this->get(route('pieces-jointes.edit', $piecesJointe));

        $response
            ->assertOk()
            ->assertViewIs('app.pieces_jointes.edit')
            ->assertViewHas('piecesJointe');
    }

    /**
     * @test
     */
    public function it_updates_the_pieces_jointe()
    {
        $piecesJointe = PiecesJointe::factory()->create();

        $recusVente = RecusVente::factory()->create();
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $devis = Devis::factory()->create();
        $facture = Facture::factory()->create();
        $reglement = Reglement::factory()->create();
        $depense = Depense::factory()->create();
        $revenu = Revenu::factory()->create();
        $entreprise = Entreprise::factory()->create();

        $data = [
            'fichier' => $this->faker->text,
            'recus_vente_id' => $recusVente->id,
            'clients_entreprise_id' => $clientsEntreprise->id,
            'devis_id' => $devis->id,
            'facture_id' => $facture->id,
            'reglement_id' => $reglement->id,
            'depense_id' => $depense->id,
            'revenu_id' => $revenu->id,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(
            route('pieces-jointes.update', $piecesJointe),
            $data
        );

        unset($data['recus_vente_id']);
        unset($data['clients_entreprise_id']);
        unset($data['devis_id']);
        unset($data['facture_id']);
        unset($data['reglement_id']);
        unset($data['depense_id']);
        unset($data['revenu_id']);
        unset($data['entreprise_id']);

        $data['id'] = $piecesJointe->id;

        $this->assertDatabaseHas('pieces_jointes', $data);

        $response->assertRedirect(route('pieces-jointes.edit', $piecesJointe));
    }

    /**
     * @test
     */
    public function it_deletes_the_pieces_jointe()
    {
        $piecesJointe = PiecesJointe::factory()->create();

        $response = $this->delete(
            route('pieces-jointes.destroy', $piecesJointe)
        );

        $response->assertRedirect(route('pieces-jointes.index'));

        $this->assertDeleted($piecesJointe);
    }
}
