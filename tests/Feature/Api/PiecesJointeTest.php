<?php

namespace Tests\Feature\Api;

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
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PiecesJointeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_pieces_jointes_list()
    {
        $piecesJointes = PiecesJointe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pieces-jointes.index'));

        $response->assertOk()->assertSee($piecesJointes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_pieces_jointe()
    {
        $data = PiecesJointe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pieces-jointes.store'), $data);

        unset($data['recus_vente_id']);
        unset($data['clients_entreprise_id']);
        unset($data['devis_id']);
        unset($data['facture_id']);
        unset($data['reglement_id']);
        unset($data['depense_id']);
        unset($data['revenu_id']);
        unset($data['entreprise_id']);

        $this->assertDatabaseHas('pieces_jointes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.pieces-jointes.update', $piecesJointe),
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

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_pieces_jointe()
    {
        $piecesJointe = PiecesJointe::factory()->create();

        $response = $this->deleteJson(
            route('api.pieces-jointes.destroy', $piecesJointe)
        );

        $this->assertDeleted($piecesJointe);

        $response->assertNoContent();
    }
}
