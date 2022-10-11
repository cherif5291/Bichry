<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Regle;
use App\Models\Banque;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BanqueReglesTest extends TestCase
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
    public function it_gets_banque_regles()
    {
        $banque = Banque::factory()->create();
        $regles = Regle::factory()
            ->count(2)
            ->create([
                'banque_id' => $banque->id,
            ]);

        $response = $this->getJson(route('api.banques.regles.index', $banque));

        $response->assertOk()->assertSee($regles[0]->motif);
    }

    /**
     * @test
     */
    public function it_stores_the_banque_regles()
    {
        $banque = Banque::factory()->create();
        $data = Regle::factory()
            ->make([
                'banque_id' => $banque->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.banques.regles.store', $banque),
            $data
        );

        $this->assertDatabaseHas('regles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $regle = Regle::latest('id')->first();

        $this->assertEquals($banque->id, $regle->banque_id);
    }
}
