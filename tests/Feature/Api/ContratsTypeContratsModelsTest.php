<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ContratsType;
use App\Models\ContratsModel;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratsTypeContratsModelsTest extends TestCase
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
    public function it_gets_contrats_type_contrats_models()
    {
        $contratsType = ContratsType::factory()->create();
        $contratsModels = ContratsModel::factory()
            ->count(2)
            ->create([
                'contrats_type_id' => $contratsType->id,
            ]);

        $response = $this->getJson(
            route('api.contrats-types.contrats-models.index', $contratsType)
        );

        $response->assertOk()->assertSee($contratsModels[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_contrats_type_contrats_models()
    {
        $contratsType = ContratsType::factory()->create();
        $data = ContratsModel::factory()
            ->make([
                'contrats_type_id' => $contratsType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.contrats-types.contrats-models.store', $contratsType),
            $data
        );

        $this->assertDatabaseHas('contrats_models', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contratsModel = ContratsModel::latest('id')->first();

        $this->assertEquals(
            $contratsType->id,
            $contratsModel->contrats_type_id
        );
    }
}
