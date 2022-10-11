<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ModelesRecu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesRecuEntreprisesTest extends TestCase
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
    public function it_gets_modeles_recu_entreprises()
    {
        $modelesRecu = ModelesRecu::factory()->create();
        $entreprises = Entreprise::factory()
            ->count(2)
            ->create([
                'modeles_recu_id' => $modelesRecu->id,
            ]);

        $response = $this->getJson(
            route('api.modeles-recus.entreprises.index', $modelesRecu)
        );

        $response->assertOk()->assertSee($entreprises[0]->nom_entreprise);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_recu_entreprises()
    {
        $modelesRecu = ModelesRecu::factory()->create();
        $data = Entreprise::factory()
            ->make([
                'modeles_recu_id' => $modelesRecu->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modeles-recus.entreprises.store', $modelesRecu),
            $data
        );

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $entreprise = Entreprise::latest('id')->first();

        $this->assertEquals($modelesRecu->id, $entreprise->modeles_recu_id);
    }
}
