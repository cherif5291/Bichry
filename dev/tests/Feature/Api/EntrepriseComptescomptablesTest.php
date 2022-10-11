<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\Comptescomptable;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseComptescomptablesTest extends TestCase
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
    public function it_gets_entreprise_comptescomptables()
    {
        $entreprise = Entreprise::factory()->create();
        $comptescomptables = Comptescomptable::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.comptescomptables.index', $entreprise)
        );

        $response->assertOk()->assertSee($comptescomptables[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_comptescomptables()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Comptescomptable::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.comptescomptables.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('comptescomptables', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $comptescomptable = Comptescomptable::latest('id')->first();

        $this->assertEquals($entreprise->id, $comptescomptable->entreprise_id);
    }
}
