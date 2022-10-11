<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ContratsType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseContratsTypesTest extends TestCase
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
    public function it_gets_entreprise_contrats_types()
    {
        $entreprise = Entreprise::factory()->create();
        $contratsTypes = ContratsType::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.contrats-types.index', $entreprise)
        );

        $response->assertOk()->assertSee($contratsTypes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_contrats_types()
    {
        $entreprise = Entreprise::factory()->create();
        $data = ContratsType::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.contrats-types.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('contrats_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contratsType = ContratsType::latest('id')->first();

        $this->assertEquals($entreprise->id, $contratsType->entreprise_id);
    }
}
