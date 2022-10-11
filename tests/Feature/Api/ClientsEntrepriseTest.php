<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ClientsEntreprise;

use App\Models\Entreprise;
use App\Models\PaiementsMode;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseTest extends TestCase
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
    public function it_gets_clients_entreprises_list()
    {
        $clientsEntreprises = ClientsEntreprise::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.clients-entreprises.index'));

        $response->assertOk()->assertSee($clientsEntreprises[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise()
    {
        $data = ClientsEntreprise::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.clients-entreprises.store'),
            $data
        );

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();
        $paiementsModalite = PaiementsModalite::factory()->create();
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'prenom' => $this->faker->text(255),
            'entreprise' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text,
            'portable' => $this->faker->text,
            'nom_pro' => $this->faker->text(255),
            'nom_chequier' => $this->faker->text(255),
            'titre' => $this->faker->text(255),
            'telecopie' => $this->faker->text(255),
            'website' => $this->faker->text(255),
            'adresse' => $this->faker->text,
            'ville' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'code_postale' => $this->faker->text(255),
            'pays' => $this->faker->text(255),
            'note' => $this->faker->text,
            'entreprise_id' => $entreprise->id,
            'paiements_mode_id' => $paiementsMode->id,
            'paiements_modalite_id' => $paiementsModalite->id,
            'devises_monetaire_id' => $devisesMonetaire->id,
        ];

        $response = $this->putJson(
            route('api.clients-entreprises.update', $clientsEntreprise),
            $data
        );

        $data['id'] = $clientsEntreprise->id;

        $this->assertDatabaseHas('clients_entreprises', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_clients_entreprise()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $response = $this->deleteJson(
            route('api.clients-entreprises.destroy', $clientsEntreprise)
        );

        $this->assertDeleted($clientsEntreprise);

        $response->assertNoContent();
    }
}
