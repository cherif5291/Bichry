<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Banque;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseBanquesTest extends TestCase
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
    public function it_gets_entreprise_banques()
    {
        $entreprise = Entreprise::factory()->create();
        $banques = Banque::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.banques.index', $entreprise)
        );

        $response->assertOk()->assertSee($banques[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_banques()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Banque::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.banques.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('banques', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $banque = Banque::latest('id')->first();

        $this->assertEquals($entreprise->id, $banque->entreprise_id);
    }
}
