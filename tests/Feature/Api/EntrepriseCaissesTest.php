<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caisse;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseCaissesTest extends TestCase
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
    public function it_gets_entreprise_caisses()
    {
        $entreprise = Entreprise::factory()->create();
        $caisses = Caisse::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.caisses.index', $entreprise)
        );

        $response->assertOk()->assertSee($caisses[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_caisses()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Caisse::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.caisses.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('caisses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caisse = Caisse::latest('id')->first();

        $this->assertEquals($entreprise->id, $caisse->entreprise_id);
    }
}
