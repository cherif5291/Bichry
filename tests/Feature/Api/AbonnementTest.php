<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Abonnement;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AbonnementTest extends TestCase
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
    public function it_gets_abonnements_list()
    {
        $abonnements = Abonnement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.abonnements.index'));

        $response->assertOk()->assertSee($abonnements[0]->expiration);
    }

    /**
     * @test
     */
    public function it_stores_the_abonnement()
    {
        $data = Abonnement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.abonnements.store'), $data);

        $this->assertDatabaseHas('abonnements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'expiration' => $this->faker->date,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(
            route('api.abonnements.update', $abonnement),
            $data
        );

        $data['id'] = $abonnement->id;

        $this->assertDatabaseHas('abonnements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_abonnement()
    {
        $abonnement = Abonnement::factory()->create();

        $response = $this->deleteJson(
            route('api.abonnements.destroy', $abonnement)
        );

        $this->assertDeleted($abonnement);

        $response->assertNoContent();
    }
}
