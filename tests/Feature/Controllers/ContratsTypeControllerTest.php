<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ContratsType;

use App\Models\Entreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratsTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_contrats_types()
    {
        $contratsTypes = ContratsType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('contrats-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_types.index')
            ->assertViewHas('contratsTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_contrats_type()
    {
        $response = $this->get(route('contrats-types.create'));

        $response->assertOk()->assertViewIs('app.contrats_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_contrats_type()
    {
        $data = ContratsType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('contrats-types.store'), $data);

        $this->assertDatabaseHas('contrats_types', $data);

        $contratsType = ContratsType::latest('id')->first();

        $response->assertRedirect(route('contrats-types.edit', $contratsType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_contrats_type()
    {
        $contratsType = ContratsType::factory()->create();

        $response = $this->get(route('contrats-types.show', $contratsType));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_types.show')
            ->assertViewHas('contratsType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_contrats_type()
    {
        $contratsType = ContratsType::factory()->create();

        $response = $this->get(route('contrats-types.edit', $contratsType));

        $response
            ->assertOk()
            ->assertViewIs('app.contrats_types.edit')
            ->assertViewHas('contratsType');
    }

    /**
     * @test
     */
    public function it_updates_the_contrats_type()
    {
        $contratsType = ContratsType::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->put(
            route('contrats-types.update', $contratsType),
            $data
        );

        $data['id'] = $contratsType->id;

        $this->assertDatabaseHas('contrats_types', $data);

        $response->assertRedirect(route('contrats-types.edit', $contratsType));
    }

    /**
     * @test
     */
    public function it_deletes_the_contrats_type()
    {
        $contratsType = ContratsType::factory()->create();

        $response = $this->delete(
            route('contrats-types.destroy', $contratsType)
        );

        $response->assertRedirect(route('contrats-types.index'));

        $this->assertDeleted($contratsType);
    }
}
