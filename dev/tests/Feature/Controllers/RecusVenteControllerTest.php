<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RecusVente;

use App\Models\Caisse;
use App\Models\Banque;
use App\Models\Article;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecusVenteControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_recus_ventes()
    {
        $recusVentes = RecusVente::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('recus-ventes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.recus_ventes.index')
            ->assertViewHas('recusVentes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_recus_vente()
    {
        $response = $this->get(route('recus-ventes.create'));

        $response->assertOk()->assertViewIs('app.recus_ventes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_recus_vente()
    {
        $data = RecusVente::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('recus-ventes.store'), $data);

        $this->assertDatabaseHas('recus_ventes', $data);

        $recusVente = RecusVente::latest('id')->first();

        $response->assertRedirect(route('recus-ventes.edit', $recusVente));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_recus_vente()
    {
        $recusVente = RecusVente::factory()->create();

        $response = $this->get(route('recus-ventes.show', $recusVente));

        $response
            ->assertOk()
            ->assertViewIs('app.recus_ventes.show')
            ->assertViewHas('recusVente');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_recus_vente()
    {
        $recusVente = RecusVente::factory()->create();

        $response = $this->get(route('recus-ventes.edit', $recusVente));

        $response
            ->assertOk()
            ->assertViewIs('app.recus_ventes.edit')
            ->assertViewHas('recusVente');
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

        $response = $this->put(
            route('recus-ventes.update', $recusVente),
            $data
        );

        $data['id'] = $recusVente->id;

        $this->assertDatabaseHas('recus_ventes', $data);

        $response->assertRedirect(route('recus-ventes.edit', $recusVente));
    }

    /**
     * @test
     */
    public function it_deletes_the_recus_vente()
    {
        $recusVente = RecusVente::factory()->create();

        $response = $this->delete(route('recus-ventes.destroy', $recusVente));

        $response->assertRedirect(route('recus-ventes.index'));

        $this->assertDeleted($recusVente);
    }
}
