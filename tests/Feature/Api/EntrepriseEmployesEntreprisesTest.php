<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseEmployesEntreprisesTest extends TestCase
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
    public function it_gets_entreprise_employes_entreprises()
    {
        $entreprise = Entreprise::factory()->create();
        $employesEntreprises = EmployesEntreprise::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.employes-entreprises.index', $entreprise)
        );

        $response->assertOk()->assertSee($employesEntreprises[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_employes_entreprises()
    {
        $entreprise = Entreprise::factory()->create();
        $data = EmployesEntreprise::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.employes-entreprises.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('employes_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $employesEntreprise = EmployesEntreprise::latest('id')->first();

        $this->assertEquals(
            $entreprise->id,
            $employesEntreprise->entreprise_id
        );
    }
}
