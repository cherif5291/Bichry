<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Reglement;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeReglementsTest extends TestCase
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
    public function it_gets_paiements_mode_reglements()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $reglements = Reglement::factory()
            ->count(2)
            ->create([
                'paiements_mode_id' => $paiementsMode->id,
            ]);

        $response = $this->getJson(
            route('api.paiements-modes.reglements.index', $paiementsMode)
        );

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode_reglements()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $data = Reglement::factory()
            ->make([
                'paiements_mode_id' => $paiementsMode->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.paiements-modes.reglements.store', $paiementsMode),
            $data
        );

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reglement = Reglement::latest('id')->first();

        $this->assertEquals($paiementsMode->id, $reglement->paiements_mode_id);
    }
}
