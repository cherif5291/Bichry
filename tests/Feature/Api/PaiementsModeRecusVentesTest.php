<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RecusVente;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeRecusVentesTest extends TestCase
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
    public function it_gets_paiements_mode_recus_ventes()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $recusVentes = RecusVente::factory()
            ->count(2)
            ->create([
                'paiements_mode_id' => $paiementsMode->id,
            ]);

        $response = $this->getJson(
            route('api.paiements-modes.recus-ventes.index', $paiementsMode)
        );

        $response->assertOk()->assertSee($recusVentes[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode_recus_ventes()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $data = RecusVente::factory()
            ->make([
                'paiements_mode_id' => $paiementsMode->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.paiements-modes.recus-ventes.store', $paiementsMode),
            $data
        );

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recusVente = RecusVente::latest('id')->first();

        $this->assertEquals($paiementsMode->id, $recusVente->paiements_mode_id);
    }
}
