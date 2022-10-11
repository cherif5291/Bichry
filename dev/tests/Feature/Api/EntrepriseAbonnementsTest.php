<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\Abonnement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseAbonnementsTest extends TestCase
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
    public function it_gets_entreprise_abonnements()
    {
        $entreprise = Entreprise::factory()->create();
        $abonnements = Abonnement::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.abonnements.index', $entreprise)
        );

        $response->assertOk()->assertSee($abonnements[0]->expiration);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_abonnements()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Abonnement::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.abonnements.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('abonnements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $abonnement = Abonnement::latest('id')->first();

        $this->assertEquals($entreprise->id, $abonnement->entreprise_id);
    }
}
