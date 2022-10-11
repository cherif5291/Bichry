<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RecusVente;
use App\Models\PiecesJointe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecusVentePiecesJointesTest extends TestCase
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
    public function it_gets_recus_vente_pieces_jointes()
    {
        $recusVente = RecusVente::factory()->create();
        $piecesJointes = PiecesJointe::factory()
            ->count(2)
            ->create([
                'recus_vente_id' => $recusVente->id,
            ]);

        $response = $this->getJson(
            route('api.recus-ventes.pieces-jointes.index', $recusVente)
        );

        $response->assertOk()->assertSee($piecesJointes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_recus_vente_pieces_jointes()
    {
        $recusVente = RecusVente::factory()->create();
        $data = PiecesJointe::factory()
            ->make([
                'recus_vente_id' => $recusVente->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.recus-ventes.pieces-jointes.store', $recusVente),
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

        $this->assertDatabaseHas('pieces_jointes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $piecesJointe = PiecesJointe::latest('id')->first();

        $this->assertEquals($recusVente->id, $piecesJointe->recus_vente_id);
    }
}
