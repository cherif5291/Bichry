<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Regle;

use App\Models\Banque;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegleTest extends TestCase
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
    public function it_gets_regles_list()
    {
        $regles = Regle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.regles.index'));

        $response->assertOk()->assertSee($regles[0]->motif);
    }

    /**
     * @test
     */
    public function it_stores_the_regle()
    {
        $data = Regle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.regles.store'), $data);

        $this->assertDatabaseHas('regles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_regle()
    {
        $regle = Regle::factory()->create();

        $banque = Banque::factory()->create();

        $data = [
            'motif' => $this->faker->text(255),
            'montant' => $this->faker->randomNumber(2),
            'banque_id' => $banque->id,
        ];

        $response = $this->putJson(route('api.regles.update', $regle), $data);

        $data['id'] = $regle->id;

        $this->assertDatabaseHas('regles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_regle()
    {
        $regle = Regle::factory()->create();

        $response = $this->deleteJson(route('api.regles.destroy', $regle));

        $this->assertDeleted($regle);

        $response->assertNoContent();
    }
}
