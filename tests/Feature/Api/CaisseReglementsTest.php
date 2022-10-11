<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caisse;
use App\Models\Reglement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseReglementsTest extends TestCase
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
    public function it_gets_caisse_reglements()
    {
        $caisse = Caisse::factory()->create();
        $reglements = Reglement::factory()
            ->count(2)
            ->create([
                'caisse_id' => $caisse->id,
            ]);

        $response = $this->getJson(
            route('api.caisses.reglements.index', $caisse)
        );

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_caisse_reglements()
    {
        $caisse = Caisse::factory()->create();
        $data = Reglement::factory()
            ->make([
                'caisse_id' => $caisse->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.caisses.reglements.store', $caisse),
            $data
        );

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reglement = Reglement::latest('id')->first();

        $this->assertEquals($caisse->id, $reglement->caisse_id);
    }
}
