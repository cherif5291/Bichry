<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rupture;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseRupturesTest extends TestCase
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
    public function it_gets_entreprise_ruptures()
    {
        $entreprise = Entreprise::factory()->create();
        $ruptures = Rupture::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.ruptures.index', $entreprise)
        );

        $response->assertOk()->assertSee($ruptures[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_ruptures()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Rupture::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.ruptures.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('ruptures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $rupture = Rupture::latest('id')->first();

        $this->assertEquals($entreprise->id, $rupture->entreprise_id);
    }
}
