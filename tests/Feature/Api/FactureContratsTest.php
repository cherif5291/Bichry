<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\Contrat;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactureContratsTest extends TestCase
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
    public function it_gets_facture_contrats()
    {
        $facture = Facture::factory()->create();
        $contrats = Contrat::factory()
            ->count(2)
            ->create([
                'facture_id' => $facture->id,
            ]);

        $response = $this->getJson(
            route('api.factures.contrats.index', $facture)
        );

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_facture_contrats()
    {
        $facture = Facture::factory()->create();
        $data = Contrat::factory()
            ->make([
                'facture_id' => $facture->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.factures.contrats.store', $facture),
            $data
        );

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contrat = Contrat::latest('id')->first();

        $this->assertEquals($facture->id, $contrat->facture_id);
    }
}
