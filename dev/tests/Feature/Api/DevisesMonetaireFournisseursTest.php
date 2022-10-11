<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fournisseur;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisesMonetaireFournisseursTest extends TestCase
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
    public function it_gets_devises_monetaire_fournisseurs()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $fournisseurs = Fournisseur::factory()
            ->count(2)
            ->create([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ]);

        $response = $this->getJson(
            route(
                'api.devises-monetaires.fournisseurs.index',
                $devisesMonetaire
            )
        );

        $response->assertOk()->assertSee($fournisseurs[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_devises_monetaire_fournisseurs()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $data = Fournisseur::factory()
            ->make([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.devises-monetaires.fournisseurs.store',
                $devisesMonetaire
            ),
            $data
        );

        $this->assertDatabaseHas('fournisseurs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $fournisseur = Fournisseur::latest('id')->first();

        $this->assertEquals(
            $devisesMonetaire->id,
            $fournisseur->devises_monetaire_id
        );
    }
}
