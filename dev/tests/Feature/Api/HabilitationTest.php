<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Habilitation;

use App\Models\Module;
use App\Models\Fonctionnalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HabilitationTest extends TestCase
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
    public function it_gets_habilitations_list()
    {
        $habilitations = Habilitation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.habilitations.index'));

        $response->assertOk()->assertSee($habilitations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_habilitation()
    {
        $data = Habilitation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.habilitations.store'), $data);

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $user = User::factory()->create();
        $module = Module::factory()->create();
        $fonctionnalite = Fonctionnalite::factory()->create();

        $data = [
            'habilitation' => $this->faker->text,
            'user_id' => $user->id,
            'module_id' => $module->id,
            'fonctionnalite_id' => $fonctionnalite->id,
        ];

        $response = $this->putJson(
            route('api.habilitations.update', $habilitation),
            $data
        );

        $data['id'] = $habilitation->id;

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_habilitation()
    {
        $habilitation = Habilitation::factory()->create();

        $response = $this->deleteJson(
            route('api.habilitations.destroy', $habilitation)
        );

        $this->assertDeleted($habilitation);

        $response->assertNoContent();
    }
}
