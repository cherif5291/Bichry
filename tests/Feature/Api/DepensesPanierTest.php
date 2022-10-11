<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DepensesPanier;

use App\Models\Depense;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepensesPanierTest extends TestCase
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
    public function it_gets_depenses_paniers_list()
    {
        $depensesPaniers = DepensesPanier::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.depenses-paniers.index'));

        $response->assertOk()->assertSee($depensesPaniers[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_depenses_panier()
    {
        $data = DepensesPanier::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.depenses-paniers.store'), $data);

        $this->assertDatabaseHas('depenses_paniers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $depense = Depense::factory()->create();

        $data = [
            'clients_entreprise_id' => $clientsEntreprise->id,
            'depense_id' => $depense->id,
        ];

        $response = $this->putJson(
            route('api.depenses-paniers.update', $depensesPanier),
            $data
        );

        $data['id'] = $depensesPanier->id;

        $this->assertDatabaseHas('depenses_paniers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_depenses_panier()
    {
        $depensesPanier = DepensesPanier::factory()->create();

        $response = $this->deleteJson(
            route('api.depenses-paniers.destroy', $depensesPanier)
        );

        $this->assertDeleted($depensesPanier);

        $response->assertNoContent();
    }
}
