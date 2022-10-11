<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fournisseur;
use App\Models\Comptescomptable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComptescomptableFournisseursTest extends TestCase
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
    public function it_gets_comptescomptable_fournisseurs()
    {
        $comptescomptable = Comptescomptable::factory()->create();
        $fournisseurs = Fournisseur::factory()
            ->count(2)
            ->create([
                'comptescomptable_id' => $comptescomptable->id,
            ]);

        $response = $this->getJson(
            route('api.comptescomptables.fournisseurs.index', $comptescomptable)
        );

        $response->assertOk()->assertSee($fournisseurs[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_comptescomptable_fournisseurs()
    {
        $comptescomptable = Comptescomptable::factory()->create();
        $data = Fournisseur::factory()
            ->make([
                'comptescomptable_id' => $comptescomptable->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.comptescomptables.fournisseurs.store',
                $comptescomptable
            ),
            $data
        );

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $fournisseur = Fournisseur::latest('id')->first();

        $this->assertEquals(
            $comptescomptable->id,
            $fournisseur->comptescomptable_id
        );
    }
}
