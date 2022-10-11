<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contrat;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployesEntrepriseContratsTest extends TestCase
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
    public function it_gets_employes_entreprise_contrats()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $contrats = Contrat::factory()
            ->count(2)
            ->create([
                'employes_entreprise_id' => $employesEntreprise->id,
            ]);

        $response = $this->getJson(
            route(
                'api.employes-entreprises.contrats.index',
                $employesEntreprise
            )
        );

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_employes_entreprise_contrats()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $data = Contrat::factory()
            ->make([
                'employes_entreprise_id' => $employesEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.employes-entreprises.contrats.store',
                $employesEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contrat = Contrat::latest('id')->first();

        $this->assertEquals(
            $employesEntreprise->id,
            $contrat->employes_entreprise_id
        );
    }
}
