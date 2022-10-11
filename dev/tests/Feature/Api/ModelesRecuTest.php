<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ModelesRecu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesRecuTest extends TestCase
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
    public function it_gets_modeles_recus_list()
    {
        $modelesRecus = ModelesRecu::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.modeles-recus.index'));

        $response->assertOk()->assertSee($modelesRecus[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_recu()
    {
        $data = ModelesRecu::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.modeles-recus.store'), $data);

        $this->assertDatabaseHas('modeles_recus', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.modeles-recus.update', $modelesRecu),
            $data
        );

        $data['id'] = $modelesRecu->id;

        $this->assertDatabaseHas('modeles_recus', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_recu()
    {
        $modelesRecu = ModelesRecu::factory()->create();

        $response = $this->deleteJson(
            route('api.modeles-recus.destroy', $modelesRecu)
        );

        $this->assertDeleted($modelesRecu);

        $response->assertNoContent();
    }
}
