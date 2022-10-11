<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\Fournisseur;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FournisseurFacturesTest extends TestCase
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
    public function it_gets_fournisseur_factures()
    {
        $fournisseur = Fournisseur::factory()->create();
        $factures = Facture::factory()
            ->count(2)
            ->create([
                'fournisseur_id' => $fournisseur->id,
            ]);

        $response = $this->getJson(
            route('api.fournisseurs.factures.index', $fournisseur)
        );

        $response->assertOk()->assertSee($factures[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_fournisseur_factures()
    {
        $fournisseur = Fournisseur::factory()->create();
        $data = Facture::factory()
            ->make([
                'fournisseur_id' => $fournisseur->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.fournisseurs.factures.store', $fournisseur),
            $data
        );

        $this->assertDatabaseHas('factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facture = Facture::latest('id')->first();

        $this->assertEquals($fournisseur->id, $facture->fournisseur_id);
    }
}
