<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Depense;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseDepensesTest extends TestCase
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
    public function it_gets_entreprise_depenses()
    {
        $entreprise = Entreprise::factory()->create();
        $depenses = Depense::factory()
            ->count(2)
            ->create([
                'client_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.depenses.index', $entreprise)
        );

        $response->assertOk()->assertSee($depenses[0]->source);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_depenses()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Depense::factory()
            ->make([
                'client_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.depenses.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('depenses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $depense = Depense::latest('id')->first();

        $this->assertEquals($entreprise->id, $depense->client_id);
    }
}
