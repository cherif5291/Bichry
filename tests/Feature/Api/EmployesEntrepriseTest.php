<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EmployesEntreprise;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployesEntrepriseTest extends TestCase
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
    public function it_gets_employes_entreprises_list()
    {
        $employesEntreprises = EmployesEntreprise::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.employes-entreprises.index'));

        $response->assertOk()->assertSee($employesEntreprises[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_employes_entreprise()
    {
        $data = EmployesEntreprise::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.employes-entreprises.store'),
            $data
        );

        $this->assertDatabaseHas('employes_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $user = User::factory()->create();

        $data = [
            'prenom' => $this->faker->text(255),
            'nom' => $this->faker->text(255),
            'initial' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'data_embauche' => $this->faker->date,
            'interval_paiement' => $this->faker->text(255),
            'duree_interval' => $this->faker->randomNumber(0),
            'remuneration' => $this->faker->randomNumber(2),
            'entreprise_id' => $entreprise->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.employes-entreprises.update', $employesEntreprise),
            $data
        );

        $data['id'] = $employesEntreprise->id;

        $this->assertDatabaseHas('employes_entreprises', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_employes_entreprise()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();

        $response = $this->deleteJson(
            route('api.employes-entreprises.destroy', $employesEntreprise)
        );

        $this->assertDeleted($employesEntreprise);

        $response->assertNoContent();
    }
}
