<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ContratsModel;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseContratsModelsTest extends TestCase
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
    public function it_gets_entreprise_contrats_models()
    {
        $entreprise = Entreprise::factory()->create();
        $contratsModels = ContratsModel::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.contrats-models.index', $entreprise)
        );

        $response->assertOk()->assertSee($contratsModels[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_contrats_models()
    {
        $entreprise = Entreprise::factory()->create();
        $data = ContratsModel::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.contrats-models.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('contrats_models', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contratsModel = ContratsModel::latest('id')->first();

        $this->assertEquals($entreprise->id, $contratsModel->entreprise_id);
    }
}
