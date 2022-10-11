<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PaiementsMode;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModeTest extends TestCase
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
    public function it_gets_paiements_modes_list()
    {
        $paiementsModes = PaiementsMode::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.paiements-modes.index'));

        $response->assertOk()->assertSee($paiementsModes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_mode()
    {
        $data = PaiementsMode::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.paiements-modes.store'), $data);

        $this->assertDatabaseHas('paiements_modes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.paiements-modes.update', $paiementsMode),
            $data
        );

        $data['id'] = $paiementsMode->id;

        $this->assertDatabaseHas('paiements_modes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_paiements_mode()
    {
        $paiementsMode = PaiementsMode::factory()->create();

        $response = $this->deleteJson(
            route('api.paiements-modes.destroy', $paiementsMode)
        );

        $this->assertDeleted($paiementsMode);

        $response->assertNoContent();
    }
}
