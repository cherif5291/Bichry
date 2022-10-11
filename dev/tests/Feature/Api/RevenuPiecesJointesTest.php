<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Revenu;
use App\Models\PiecesJointe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RevenuPiecesJointesTest extends TestCase
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
    public function it_gets_revenu_pieces_jointes()
    {
        $revenu = Revenu::factory()->create();
        $piecesJointes = PiecesJointe::factory()
            ->count(2)
            ->create([
                'revenu_id' => $revenu->id,
            ]);

        $response = $this->getJson(
            route('api.revenus.pieces-jointes.index', $revenu)
        );

        $response->assertOk()->assertSee($piecesJointes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_revenu_pieces_jointes()
    {
        $revenu = Revenu::factory()->create();
        $data = PiecesJointe::factory()
            ->make([
                'revenu_id' => $revenu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.revenus.pieces-jointes.store', $revenu),
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

        $this->assertEquals($revenu->id, $piecesJointe->revenu_id);
    }
}
