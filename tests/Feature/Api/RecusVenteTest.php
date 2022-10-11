<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RecusVente;

use App\Models\Caisse;
use App\Models\Banque;
use App\Models\Article;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecusVenteTest extends TestCase
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
    public function it_gets_recus_ventes_list()
    {
        $recusVentes = RecusVente::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.recus-ventes.index'));

        $response->assertOk()->assertSee($recusVentes[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_recus_vente()
    {
        $data = RecusVente::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.recus-ventes.store'), $data);

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_recus_vente()
    {
        $recusVente = RecusVente::factory()->create();

        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $article = Article::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();
        $caisse = Caisse::factory()->create();
        $banque = Banque::factory()->create();

        $data = [
            'cc_cci' => $this->faker->text,
            'adresse_livraison' => $this->faker->text,
            'date_recu_vente' => $this->faker->date,
            'reference' => $this->faker->randomNumber,
            'numero_recu' => $this->faker->randomNumber,
            'message_recu' => $this->faker->text,
            'message_releve' => $this->faker->text,
            'depose_sur' => $this->faker->text(255),
            'montant' => $this->faker->randomNumber(2),
            'clients_entreprise_id' => $clientsEntreprise->id,
            'article_id' => $article->id,
            'paiements_mode_id' => $paiementsMode->id,
            'caisse_id' => $caisse->id,
            'banque_id' => $banque->id,
        ];

        $response = $this->putJson(
            route('api.recus-ventes.update', $recusVente),
            $data
        );

        $data['id'] = $recusVente->id;

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_recus_vente()
    {
        $recusVente = RecusVente::factory()->create();

        $response = $this->deleteJson(
            route('api.recus-ventes.destroy', $recusVente)
        );

        $this->assertDeleted($recusVente);

        $response->assertNoContent();
    }
}
