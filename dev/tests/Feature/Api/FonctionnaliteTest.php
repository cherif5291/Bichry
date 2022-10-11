<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fonctionnalite;

use App\Models\Module;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FonctionnaliteTest extends TestCase
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
    public function it_gets_fonctionnalites_list()
    {
        $fonctionnalites = Fonctionnalite::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.fonctionnalites.index'));

        $response->assertOk()->assertSee($fonctionnalites[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_fonctionnalite()
    {
        $data = Fonctionnalite::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.fonctionnalites.store'), $data);

        $this->assertDatabaseHas('fonctionnalites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $module = Module::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'voir' => $this->faker->text(255),
            'ajouter' => $this->faker->text(255),
            'supprimer' => $this->faker->text(255),
            'modifier' => $this->faker->text(255),
            'exporter' => $this->faker->text(255),
            'module_id' => $module->id,
        ];

        $response = $this->putJson(
            route('api.fonctionnalites.update', $fonctionnalite),
            $data
        );

        $data['id'] = $fonctionnalite->id;

        $this->assertDatabaseHas('fonctionnalites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_fonctionnalite()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();

        $response = $this->deleteJson(
            route('api.fonctionnalites.destroy', $fonctionnalite)
        );

        $this->assertDeleted($fonctionnalite);

        $response->assertNoContent();
    }
}
