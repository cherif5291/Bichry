<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Depense;

use App\Models\Entreprise;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepenseTest extends TestCase
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
    public function it_gets_depenses_list()
    {
        $depenses = Depense::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.depenses.index'));

        $response->assertOk()->assertSee($depenses[0]->source);
    }

    /**
     * @test
     */
    public function it_stores_the_depense()
    {
        $data = Depense::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.depenses.store'), $data);

        $this->assertDatabaseHas('depenses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_depense()
    {
        $depense = Depense::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $paiementsMode = PaiementsMode::factory()->create();

        $data = [
            'reference' => $this->faker->randomNumber,
            'note' => $this->faker->text,
            'source' => $this->faker->text(255),
            'client_id' => $entreprise->id,
            'paiements_mode_id' => $paiementsMode->id,
        ];

        $response = $this->putJson(
            route('api.depenses.update', $depense),
            $data
        );

        $data['id'] = $depense->id;

        $this->assertDatabaseHas('depenses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_depense()
    {
        $depense = Depense::factory()->create();

        $response = $this->deleteJson(route('api.depenses.destroy', $depense));

        $this->assertDeleted($depense);

        $response->assertNoContent();
    }
}
