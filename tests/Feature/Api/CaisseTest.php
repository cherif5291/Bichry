<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caisse;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaisseTest extends TestCase
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
    public function it_gets_caisses_list()
    {
        $caisses = Caisse::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.caisses.index'));

        $response->assertOk()->assertSee($caisses[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_caisse()
    {
        $data = Caisse::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.caisses.store'), $data);

        $this->assertDatabaseHas('caisses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_caisse()
    {
        $caisse = Caisse::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'solde' => $this->faker->randomNumber(2),
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(route('api.caisses.update', $caisse), $data);

        $data['id'] = $caisse->id;

        $this->assertDatabaseHas('caisses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_caisse()
    {
        $caisse = Caisse::factory()->create();

        $response = $this->deleteJson(route('api.caisses.destroy', $caisse));

        $this->assertDeleted($caisse);

        $response->assertNoContent();
    }
}
