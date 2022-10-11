<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contrat;
use App\Models\Fournisseur;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FournisseurContratsTest extends TestCase
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
    public function it_gets_fournisseur_contrats()
    {
        $fournisseur = Fournisseur::factory()->create();
        $contrats = Contrat::factory()
            ->count(2)
            ->create([
                'fournisseur_id' => $fournisseur->id,
            ]);

        $response = $this->getJson(
            route('api.fournisseurs.contrats.index', $fournisseur)
        );

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_fournisseur_contrats()
    {
        $fournisseur = Fournisseur::factory()->create();
        $data = Contrat::factory()
            ->make([
                'fournisseur_id' => $fournisseur->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.fournisseurs.contrats.store', $fournisseur),
            $data
        );

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contrat = Contrat::latest('id')->first();

        $this->assertEquals($fournisseur->id, $contrat->fournisseur_id);
    }
}
