<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fournisseur;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModaliteFournisseursTest extends TestCase
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
    public function it_gets_paiements_modalite_fournisseurs()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $fournisseurs = Fournisseur::factory()
            ->count(2)
            ->create([
                'paiements_modalite_id' => $paiementsModalite->id,
            ]);

        $response = $this->getJson(
            route(
                'api.paiements-modalites.fournisseurs.index',
                $paiementsModalite
            )
        );

        $response->assertOk()->assertSee($fournisseurs[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_modalite_fournisseurs()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $data = Fournisseur::factory()
            ->make([
                'paiements_modalite_id' => $paiementsModalite->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.paiements-modalites.fournisseurs.store',
                $paiementsModalite
            ),
            $data
        );

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $fournisseur = Fournisseur::latest('id')->first();

        $this->assertEquals(
            $paiementsModalite->id,
            $fournisseur->paiements_modalite_id
        );
    }
}
