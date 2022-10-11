<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ContratsModel;

use App\Models\Entreprise;
use App\Models\ContratsType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratsModelControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_contrats_models()
    {
        $contratsModels = ContratsModel::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('contrats-models.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_models.index')
            ->assertViewHas('contratsModels');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_contrats_model()
    {
        $response = $this->get(route('contrats-models.create'));

        $response->assertOk()->assertViewIs('app.contrats_models.create');
    }

    /**
     * @test
     */
    public function it_stores_the_contrats_model()
    {
        $data = ContratsModel::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('contrats-models.store'), $data);

        $this->assertDatabaseHas('contrats_models', $data);

        $contratsModel = ContratsModel::latest('id')->first();

        $response->assertRedirect(
            route('contrats-models.edit', $contratsModel)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_contrats_model()
    {
        $contratsModel = ContratsModel::factory()->create();

        $response = $this->get(route('contrats-models.show', $contratsModel));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_models.show')
            ->assertViewHas('contratsModel');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_contrats_model()
    {
        $contratsModel = ContratsModel::factory()->create();

        $response = $this->get(route('contrats-models.edit', $contratsModel));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_models.edit')
            ->assertViewHas('contratsModel');
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

        $response = $this->put(
            route('contrats-models.update', $contratsModel),
            $data
        );

        $data['id'] = $contratsModel->id;

        $this->assertDatabaseHas('contrats_models', $data);

        $response->assertRedirect(
            route('contrats-models.edit', $contratsModel)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_contrats_model()
    {
        $contratsModel = ContratsModel::factory()->create();

        $response = $this->delete(
            route('contrats-models.destroy', $contratsModel)
        );

        $response->assertRedirect(route('contrats-models.index'));

        $this->assertDeleted($contratsModel);
    }
}
