<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banque;

use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueTest extends TestCase
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
    public function it_gets_banques_list()
    {
        $banques = Banque::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.banques.index'));

        $response->assertOk()->assertSee($banques[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_banque()
    {
        $data = Banque::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.banques.store'), $data);

        $this->assertDatabaseHas('banques', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_banque()
    {
        $banque = Banque::factory()->create();

        $entreprise = Entreprise::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(route('api.banques.update', $banque), $data);

        $data['id'] = $banque->id;

        $this->assertDatabaseHas('banques', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_banque()
    {
        $banque = Banque::factory()->create();

        $response = $this->deleteJson(route('api.banques.destroy', $banque));

        $this->assertDeleted($banque);

        $response->assertNoContent();
    }
}
