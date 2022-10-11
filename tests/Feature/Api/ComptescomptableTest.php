<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Comptescomptable;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComptescomptableTest extends TestCase
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
    public function it_gets_comptescomptables_list()
    {
        $comptescomptables = Comptescomptable::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.comptescomptables.index'));

        $response->assertOk()->assertSee($comptescomptables[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_comptescomptable()
    {
        $data = Comptescomptable::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.comptescomptables.store'),
            $data
        );

        $this->assertDatabaseHas('comptescomptables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text(255),
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(
            route('api.comptescomptables.update', $comptescomptable),
            $data
        );

        $data['id'] = $comptescomptable->id;

        $this->assertDatabaseHas('comptescomptables', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_comptescomptable()
    {
        $comptescomptable = Comptescomptable::factory()->create();

        $response = $this->deleteJson(
            route('api.comptescomptables.destroy', $comptescomptable)
        );

        $this->assertDeleted($comptescomptable);

        $response->assertNoContent();
    }
}
