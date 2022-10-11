<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModaliteFacturesTest extends TestCase
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
    public function it_gets_paiements_modalite_factures()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $factures = Facture::factory()
            ->count(2)
            ->create([
                'paiements_modalite_id' => $paiementsModalite->id,
            ]);

        $response = $this->getJson(
            route('api.paiements-modalites.factures.index', $paiementsModalite)
        );

        $response->assertOk()->assertSee($factures[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_modalite_factures()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();
        $data = Facture::factory()
            ->make([
                'paiements_modalite_id' => $paiementsModalite->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.paiements-modalites.factures.store', $paiementsModalite),
            $data
        );

        $this->assertDatabaseHas('factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facture = Facture::latest('id')->first();

        $this->assertEquals(
            $paiementsModalite->id,
            $facture->paiements_modalite_id
        );
    }
}
