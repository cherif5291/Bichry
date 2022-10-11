<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ModelesFacture;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesFactureEntreprisesTest extends TestCase
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
    public function it_gets_modeles_facture_entreprises()
    {
        $modelesFacture = ModelesFacture::factory()->create();
        $entreprises = Entreprise::factory()
            ->count(2)
            ->create([
                'modeles_facture_id' => $modelesFacture->id,
            ]);

        $response = $this->getJson(
            route('api.modeles-factures.entreprises.index', $modelesFacture)
        );

        $response->assertOk()->assertSee($entreprises[0]->nom_entreprise);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_facture_entreprises()
    {
        $modelesFacture = ModelesFacture::factory()->create();
        $data = Entreprise::factory()
            ->make([
                'modeles_facture_id' => $modelesFacture->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modeles-factures.entreprises.store', $modelesFacture),
            $data
        );

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $entreprise = Entreprise::latest('id')->first();

        $this->assertEquals(
            $modelesFacture->id,
            $entreprise->modeles_facture_id
        );
    }
}
