<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ModelesDevis;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesDevisEntreprisesTest extends TestCase
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
    public function it_gets_modeles_devis_entreprises()
    {
        $modelesDevis = ModelesDevis::factory()->create();
        $entreprises = Entreprise::factory()
            ->count(2)
            ->create([
                'modeles_devis_id' => $modelesDevis->id,
            ]);

        $response = $this->getJson(
            route('api.all-modeles-devis.entreprises.index', $modelesDevis)
        );

        $response->assertOk()->assertSee($entreprises[0]->nom_entreprise);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_devis_entreprises()
    {
        $modelesDevis = ModelesDevis::factory()->create();
        $data = Entreprise::factory()
            ->make([
                'modeles_devis_id' => $modelesDevis->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-modeles-devis.entreprises.store', $modelesDevis),
            $data
        );

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $entreprise = Entreprise::latest('id')->first();

        $this->assertEquals($modelesDevis->id, $entreprise->modeles_devis_id);
    }
}
