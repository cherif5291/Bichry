<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;

use App\Models\ModelesRecu;
use App\Models\ModelesDevis;
use App\Models\ModelesFacture;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseTest extends TestCase
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
    public function it_gets_entreprises_list()
    {
        $entreprises = Entreprise::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.entreprises.index'));

        $response->assertOk()->assertSee($entreprises[0]->nom_entreprise);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise()
    {
        $data = Entreprise::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.entreprises.store'), $data);

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $user = User::factory()->create();
        $modelesDevis = ModelesDevis::factory()->create();
        $modelesFacture = ModelesFacture::factory()->create();
        $modelesRecu = ModelesRecu::factory()->create();
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom_entreprise' => $this->faker->text(255),
            'a_propos' => $this->faker->text,
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'adresse' => $this->faker->text,
            'capital' => $this->faker->randomNumber(2),
            'couleur_primaire' => $this->faker->text(255),
            'couleur_secondaire' => $this->faker->text(255),
            'user_id' => $user->id,
            'modeles_devis_id' => $modelesDevis->id,
            'modeles_facture_id' => $modelesFacture->id,
            'modeles_recu_id' => $modelesRecu->id,
            'devises_monetaire_id' => $devisesMonetaire->id,
        ];

        $response = $this->putJson(
            route('api.entreprises.update', $entreprise),
            $data
        );

        $data['id'] = $entreprise->id;

        $this->assertDatabaseHas('entreprises', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_entreprise()
    {
        $entreprise = Entreprise::factory()->create();

        $response = $this->deleteJson(
            route('api.entreprises.destroy', $entreprise)
        );

        $this->assertDeleted($entreprise);

        $response->assertNoContent();
    }
}
