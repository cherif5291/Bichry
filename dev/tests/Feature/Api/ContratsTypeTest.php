<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ContratsType;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContratsTypeTest extends TestCase
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
    public function it_gets_contrats_types_list()
    {
        $contratsTypes = ContratsType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contrats-types.index'));

        $response->assertOk()->assertSee($contratsTypes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_contrats_type()
    {
        $data = ContratsType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contrats-types.store'), $data);

        $this->assertDatabaseHas('contrats_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.contrats-types.update', $contratsType),
            $data
        );

        $data['id'] = $contratsType->id;

        $this->assertDatabaseHas('contrats_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contrats_type()
    {
        $contratsType = ContratsType::factory()->create();

        $response = $this->deleteJson(
            route('api.contrats-types.destroy', $contratsType)
        );

        $this->assertDeleted($contratsType);

        $response->assertNoContent();
    }
}
