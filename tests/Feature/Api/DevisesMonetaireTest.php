<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DevisesMonetaire;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisesMonetaireTest extends TestCase
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
    public function it_gets_devises_monetaires_list()
    {
        $devisesMonetaires = DevisesMonetaire::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.devises-monetaires.index'));

        $response->assertOk()->assertSee($devisesMonetaires[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_devises_monetaire()
    {
        $data = DevisesMonetaire::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.devises-monetaires.store'),
            $data
        );

        $this->assertDatabaseHas('devises_monetaires', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'sigle' => $this->faker->text(255),
            'taux_echange' => $this->faker->randomNumber(2),
        ];

        $response = $this->putJson(
            route('api.devises-monetaires.update', $devisesMonetaire),
            $data
        );

        $data['id'] = $devisesMonetaire->id;

        $this->assertDatabaseHas('devises_monetaires', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_devises_monetaire()
    {
        $devisesMonetaire = DevisesMonetaire::factory()->create();

        $response = $this->deleteJson(
            route('api.devises-monetaires.destroy', $devisesMonetaire)
        );

        $this->assertDeleted($devisesMonetaire);

        $response->assertNoContent();
    }
}
