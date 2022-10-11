<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\InfosSystem;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InfosSystemTest extends TestCase
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
    public function it_gets_infos_systems_list()
    {
        $infosSystems = InfosSystem::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.infos-systems.index'));

        $response->assertOk()->assertSee($infosSystems[0]->nom_plateforme);
    }

    /**
     * @test
     */
    public function it_stores_the_infos_system()
    {
        $data = InfosSystem::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.infos-systems.store'), $data);

        $this->assertDatabaseHas('infos_systems', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $data = [
            'nom_plateforme' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'website' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'email_contact' => $this->faker->email,
            'email_support' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.infos-systems.update', $infosSystem),
            $data
        );

        $data['id'] = $infosSystem->id;

        $this->assertDatabaseHas('infos_systems', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_infos_system()
    {
        $infosSystem = InfosSystem::factory()->create();

        $response = $this->deleteJson(
            route('api.infos-systems.destroy', $infosSystem)
        );

        $this->assertDeleted($infosSystem);

        $response->assertNoContent();
    }
}
