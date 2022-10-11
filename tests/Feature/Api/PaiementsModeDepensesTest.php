<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Depense;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeDepensesTest extends TestCase
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
    public function it_gets_paiements_mode_depenses()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $depenses = Depense::factory()
            ->count(2)
            ->create([
                'paiements_mode_id' => $paiementsMode->id,
            ]);

        $response = $this->getJson(
            route('api.paiements-modes.depenses.index', $paiementsMode)
        );

        $response->assertOk()->assertSee($depenses[0]->source);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode_depenses()
    {
        $paiementsMode = PaiementsMode::factory()->create();
        $data = Depense::factory()
            ->make([
                'paiements_mode_id' => $paiementsMode->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.paiements-modes.depenses.store', $paiementsMode),
            $data
        );

        $this->assertDatabaseHas('depenses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $depense = Depense::latest('id')->first();

        $this->assertEquals($paiementsMode->id, $depense->paiements_mode_id);
    }
}
