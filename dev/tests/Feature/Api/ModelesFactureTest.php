<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ModelesFacture;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelesFactureTest extends TestCase
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
    public function it_gets_modeles_factures_list()
    {
        $modelesFactures = ModelesFacture::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.modeles-factures.index'));

        $response->assertOk()->assertSee($modelesFactures[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_modeles_facture()
    {
        $data = ModelesFacture::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.modeles-factures.store'), $data);

        $this->assertDatabaseHas('modeles_factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.modeles-factures.update', $modelesFacture),
            $data
        );

        $data['id'] = $modelesFacture->id;

        $this->assertDatabaseHas('modeles_factures', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_modeles_facture()
    {
        $modelesFacture = ModelesFacture::factory()->create();

        $response = $this->deleteJson(
            route('api.modeles-factures.destroy', $modelesFacture)
        );

        $this->assertDeleted($modelesFacture);

        $response->assertNoContent();
    }
}
