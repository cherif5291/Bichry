<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Presence;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployesEntreprisePresencesTest extends TestCase
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
    public function it_gets_employes_entreprise_presences()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $presences = Presence::factory()
            ->count(2)
            ->create([
                'employes_entreprise_id' => $employesEntreprise->id,
            ]);

        $response = $this->getJson(
            route(
                'api.employes-entreprises.presences.index',
                $employesEntreprise
            )
        );

        $response->assertOk()->assertSee($presences[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_employes_entreprise_presences()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $data = Presence::factory()
            ->make([
                'employes_entreprise_id' => $employesEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route(
                'api.employes-entreprises.presences.store',
                $employesEntreprise
            ),
            $data
        );

        $this->assertDatabaseHas('presences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $presence = Presence::latest('id')->first();

        $this->assertEquals(
            $employesEntreprise->id,
            $presence->employes_entreprise_id
        );
    }
}
