<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\PaiementsModalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntreprisePaiementsModalitesTest extends TestCase
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
    public function it_gets_entreprise_paiements_modalites()
    {
        $entreprise = Entreprise::factory()->create();
        $paiementsModalites = PaiementsModalite::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.paiements-modalites.index', $entreprise)
        );

        $response->assertOk()->assertSee($paiementsModalites[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_paiements_modalites()
    {
        $entreprise = Entreprise::factory()->create();
        $data = PaiementsModalite::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.paiements-modalites.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('paiements_modalites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $paiementsModalite = PaiementsModalite::latest('id')->first();

        $this->assertEquals($entreprise->id, $paiementsModalite->entreprise_id);
    }
}
