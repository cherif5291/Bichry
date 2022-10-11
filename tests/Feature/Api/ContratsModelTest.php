<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ContratsModel;

use App\Models\Entreprise;
use App\Models\ContratsType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratsModelTest extends TestCase
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
    public function it_gets_contrats_models_list()
    {
        $contratsModels = ContratsModel::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contrats-models.index'));

        $response->assertOk()->assertSee($contratsModels[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_contrats_model()
    {
        $data = ContratsModel::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contrats-models.store'), $data);

        $this->assertDatabaseHas('contrats_models', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_contrats_model()
    {
        $contratsModel = ContratsModel::factory()->create();

        $contratsType = ContratsType::factory()->create();
        $entreprise = Entreprise::factory()->create();

        $data = [
            'contrats_type_id' => $contratsType->id,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(
            route('api.contrats-models.update', $contratsModel),
            $data
        );

        $data['id'] = $contratsModel->id;

        $this->assertDatabaseHas('contrats_models', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contrats_model()
    {
        $contratsModel = ContratsModel::factory()->create();

        $response = $this->deleteJson(
            route('api.contrats-models.destroy', $contratsModel)
        );

        $this->assertDeleted($contratsModel);

        $response->assertNoContent();
    }
}
