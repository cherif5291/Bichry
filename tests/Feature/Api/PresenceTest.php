<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Presence;

use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PresenceTest extends TestCase
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
    public function it_gets_presences_list()
    {
        $presences = Presence::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.presences.index'));

        $response->assertOk()->assertSee($presences[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_presence()
    {
        $data = Presence::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.presences.store'), $data);

        $this->assertDatabaseHas('presences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_presence()
    {
        $presence = Presence::factory()->create();

        $employesEntreprise = EmployesEntreprise::factory()->create();

        $data = [
            'date' => $this->faker->date,
            'heure_arrive' => $this->faker->time,
            'heure_depard' => $this->faker->time,
            'temps_absence' => $this->faker->randomNumber(0),
            'est_present' => $this->faker->text(255),
            'employes_entreprise_id' => $employesEntreprise->id,
        ];

        $response = $this->putJson(
            route('api.presences.update', $presence),
            $data
        );

        $data['id'] = $presence->id;

        $this->assertDatabaseHas('presences', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_presence()
    {
        $presence = Presence::factory()->create();

        $response = $this->deleteJson(
            route('api.presences.destroy', $presence)
        );

        $this->assertDeleted($presence);

        $response->assertNoContent();
    }
}
