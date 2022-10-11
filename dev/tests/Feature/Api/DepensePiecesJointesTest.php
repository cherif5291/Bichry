<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Depense;
use App\Models\PiecesJointe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepensePiecesJointesTest extends TestCase
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
    public function it_gets_depense_pieces_jointes()
    {
        $depense = Depense::factory()->create();
        $piecesJointes = PiecesJointe::factory()
            ->count(2)
            ->create([
                'depense_id' => $depense->id,
            ]);

        $response = $this->getJson(
            route('api.depenses.pieces-jointes.index', $depense)
        );

        $response->assertOk()->assertSee($piecesJointes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_depense_pieces_jointes()
    {
        $depense = Depense::factory()->create();
        $data = PiecesJointe::factory()
            ->make([
                'depense_id' => $depense->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.depenses.pieces-jointes.store', $depense),
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

        $this->assertEquals($depense->id, $piecesJointe->depense_id);
    }
}
