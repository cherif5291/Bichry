<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ModelesDevis;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesDevisTest extends TestCase
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
    public function it_gets_all_modeles_devis_list()
    {
        $allModelesDevis = ModelesDevis::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-modeles-devis.index'));

        $response->assertOk()->assertSee($allModelesDevis[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_devis()
    {
        $data = ModelesDevis::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-modeles-devis.store'),
            $data
        );

        $this->assertDatabaseHas('modeles_devis', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.all-modeles-devis.update', $modelesDevis),
            $data
        );

        $data['id'] = $modelesDevis->id;

        $this->assertDatabaseHas('modeles_devis', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_devis()
    {
        $modelesDevis = ModelesDevis::factory()->create();

        $response = $this->deleteJson(
            route('api.all-modeles-devis.destroy', $modelesDevis)
        );

        $this->assertDeleted($modelesDevis);

        $response->assertNoContent();
    }
}
