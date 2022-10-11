<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caisse;
use App\Models\RecusVente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseRecusVentesTest extends TestCase
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
    public function it_gets_caisse_recus_ventes()
    {
        $caisse = Caisse::factory()->create();
        $recusVentes = RecusVente::factory()
            ->count(2)
            ->create([
                'caisse_id' => $caisse->id,
            ]);

        $response = $this->getJson(
            route('api.caisses.recus-ventes.index', $caisse)
        );

        $response->assertOk()->assertSee($recusVentes[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_caisse_recus_ventes()
    {
        $caisse = Caisse::factory()->create();
        $data = RecusVente::factory()
            ->make([
                'caisse_id' => $caisse->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.caisses.recus-ventes.store', $caisse),
            $data
        );

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recusVente = RecusVente::latest('id')->first();

        $this->assertEquals($caisse->id, $recusVente->caisse_id);
    }
}
