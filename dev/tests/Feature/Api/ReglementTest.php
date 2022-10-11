<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Reglement;

use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Facture;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReglementTest extends TestCase
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
    public function it_gets_reglements_list()
    {
        $reglements = Reglement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.reglements.index'));

        $response->assertOk()->assertSee($reglements[0]->reference);
    }

    /**
     * @test
     */
    public function it_stores_the_reglement()
    {
        $data = Reglement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.reglements.store'), $data);

        $this->assertDatabaseHas('reglements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_reglement()
    {
        $reglement = Reglement::factory()->create();

        $facture = Facture::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $banque = Banque::factory()->create();
        $caisse = Caisse::factory()->create();

        $data = [
            'reference' => $this->faker->text(255),
            'cc_cci' => $this->faker->text(255),
            'approvisionnememnt' => $this->faker->text(255),
            'montant_recu' => $this->faker->randomNumber(2),
            'note' => $this->faker->text,
            'facture_id' => $facture->id,
            'paiements_mode_id' => $paiementsMode->id,
            'clients_entreprise_id' => $clientsEntreprise->id,
            'banque_id' => $banque->id,
            'caisse_id' => $caisse->id,
        ];

        $response = $this->putJson(
            route('api.reglements.update', $reglement),
            $data
        );

        $data['id'] = $reglement->id;

        $this->assertDatabaseHas('reglements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_reglement()
    {
        $reglement = Reglement::factory()->create();

        $response = $this->deleteJson(
            route('api.reglements.destroy', $reglement)
        );

        $this->assertDeleted($reglement);

        $response->assertNoContent();
    }
}
