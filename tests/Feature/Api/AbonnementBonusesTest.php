<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bonus;
use App\Models\Abonnement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AbonnementBonusesTest extends TestCase
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
    public function it_gets_abonnement_bonuses()
    {
        $abonnement = Abonnement::factory()->create();
        $bonuses = Bonus::factory()
            ->count(2)
            ->create([
                'abonnement_id' => $abonnement->id,
            ]);

        $response = $this->getJson(
            route('api.abonnements.bonuses.index', $abonnement)
        );

        $response->assertOk()->assertSee($bonuses[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_abonnement_bonuses()
    {
        $abonnement = Abonnement::factory()->create();
        $data = Bonus::factory()
            ->make([
                'abonnement_id' => $abonnement->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.abonnements.bonuses.store', $abonnement),
            $data
        );

        $this->assertDatabaseHas('bonuses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $bonus = Bonus::latest('id')->first();

        $this->assertEquals($abonnement->id, $bonus->abonnement_id);
    }
}
