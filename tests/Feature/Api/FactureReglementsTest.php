<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\Reglement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactureReglementsTest extends TestCase
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
    public function it_gets_facture_reglements()
    {
        $facture = Facture::factory()->create();
        $reglements = Reglement::factory()
            ->count(2)
            ->create([
                'facture_id' => $facture->id,
            ]);

        $response = $this->getJson(
            route('api.factures.reglements.index', $facture)
        );

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_facture_reglements()
    {
        $facture = Facture::factory()->create();
        $data = Reglement::factory()
            ->make([
                'facture_id' => $facture->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.factures.reglements.store', $facture),
            $data
        );

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $reglement = Reglement::latest('id')->first();

        $this->assertEquals($facture->id, $reglement->facture_id);
    }
}
