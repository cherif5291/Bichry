<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\Fournisseur;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseFournisseursTest extends TestCase
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
    public function it_gets_entreprise_fournisseurs()
    {
        $entreprise = Entreprise::factory()->create();
        $fournisseurs = Fournisseur::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.fournisseurs.index', $entreprise)
        );

        $response->assertOk()->assertSee($fournisseurs[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_fournisseurs()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Fournisseur::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.fournisseurs.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $fournisseur = Fournisseur::latest('id')->first();

        $this->assertEquals($entreprise->id, $fournisseur->entreprise_id);
    }
}
