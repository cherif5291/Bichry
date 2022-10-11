<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisesMonetaireEntreprisesTest extends TestCase
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
    public function it_gets_devises_monetaire_entreprises()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $entreprises = Entreprise::factory()
            ->count(2)
            ->create([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ]);

        $response = $this->getJson(
            route('api.devises-monetaires.entreprises.index', $devisesMonetaire)
        );

        $response->assertOk()->assertSee($entreprises[0]->nom_entreprise);
    }

    /**
     * @test
     */
    public function it_stores_the_devises_monetaire_entreprises()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();
        $data = Entreprise::factory()
            ->make([
                'devises_monetaire_id' => $devisesMonetaire->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.devises-monetaires.entreprises.store',
                $devisesMonetaire
            ),
            $data
        );

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $entreprise = Entreprise::latest('id')->first();

        $this->assertEquals(
            $devisesMonetaire->id,
            $entreprise->devises_monetaire_id
        );
    }
}
