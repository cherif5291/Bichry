<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PaiementsModalite;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaiementsModaliteTest extends TestCase
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
    public function it_gets_paiements_modalites_list()
    {
        $paiementsModalites = PaiementsModalite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.paiements-modalites.index'));

        $response->assertOk()->assertSee($paiementsModalites[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_paiements_modalite()
    {
        $data = PaiementsModalite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.paiements-modalites.store'),
            $data
        );

        $this->assertDatabaseHas('paiements_modalites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(
            route('api.paiements-modalites.update', $paiementsModalite),
            $data
        );

        $data['id'] = $paiementsModalite->id;

        $this->assertDatabaseHas('paiements_modalites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_paiements_modalite()
    {
        $paiementsModalite = PaiementsModalite::factory()->create();

        $response = $this->deleteJson(
            route('api.paiements-modalites.destroy', $paiementsModalite)
        );

        $this->assertDeleted($paiementsModalite);

        $response->assertNoContent();
    }
}
