<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bonus;

use App\Models\Abonnement;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BonusTest extends TestCase
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
    public function it_gets_bonuses_list()
    {
        $bonuses = Bonus::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.bonuses.index'));

        $response->assertOk()->assertSee($bonuses[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_bonus()
    {
        $data = Bonus::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.bonuses.store'), $data);

        $this->assertDatabaseHas('bonuses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_bonus()
    {
        $bonus = Bonus::factory()->create();

        $abonnement = Abonnement::factory()->create();

        $data = [
            'type' => $this->faker->word,
            'duree' => $this->faker->date,
            'abonnement_id' => $abonnement->id,
        ];

        $response = $this->putJson(route('api.bonuses.update', $bonus), $data);

        $data['id'] = $bonus->id;

        $this->assertDatabaseHas('bonuses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_bonus()
    {
        $bonus = Bonus::factory()->create();

        $response = $this->deleteJson(route('api.bonuses.destroy', $bonus));

        $this->assertDeleted($bonus);

        $response->assertNoContent();
    }
}
