<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banque;
use App\Models\RecusVente;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueRecusVentesTest extends TestCase
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
    public function it_gets_banque_recus_ventes()
    {
        $banque = Banque::factory()->create();
        $recusVentes = RecusVente::factory()
            ->count(2)
            ->create([
                'banque_id' => $banque->id,
            ]);

        $response = $this->getJson(
            route('api.banques.recus-ventes.index', $banque)
        );

        $response->assertOk()->assertSee($recusVentes[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_banque_recus_ventes()
    {
        $banque = Banque::factory()->create();
        $data = RecusVente::factory()
            ->make([
                'banque_id' => $banque->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.banques.recus-ventes.store', $banque),
            $data
        );

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recusVente = RecusVente::latest('id')->first();

        $this->assertEquals($banque->id, $recusVente->banque_id);
    }
}
