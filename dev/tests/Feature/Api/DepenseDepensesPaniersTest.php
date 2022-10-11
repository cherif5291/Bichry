<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Depense;
use App\Models\DepensesPanier;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepenseDepensesPaniersTest extends TestCase
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
    public function it_gets_depense_depenses_paniers()
    {
        $depense = Depense::factory()->create();
        $depensesPaniers = DepensesPanier::factory()
            ->count(2)
            ->create([
                'depense_id' => $depense->id,
            ]);

        $response = $this->getJson(
            route('api.depenses.depenses-paniers.index', $depense)
        );

        $response->assertOk()->assertSee($depensesPaniers[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_depense_depenses_paniers()
    {
        $depense = Depense::factory()->create();
        $data = DepensesPanier::factory()
            ->make([
                'depense_id' => $depense->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.depenses.depenses-paniers.store', $depense),
            $data
        );

        $this->assertDatabaseHas('depenses_paniers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $depensesPanier = DepensesPanier::latest('id')->first();

        $this->assertEquals($depense->id, $depensesPanier->depense_id);
    }
}
