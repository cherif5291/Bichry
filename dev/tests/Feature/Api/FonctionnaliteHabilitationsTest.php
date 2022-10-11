<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Habilitation;
use App\Models\Fonctionnalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FonctionnaliteHabilitationsTest extends TestCase
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
    public function it_gets_fonctionnalite_habilitations()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();
        $habilitations = Habilitation::factory()
            ->count(2)
            ->create([
                'fonctionnalite_id' => $fonctionnalite->id,
            ]);

        $response = $this->getJson(
            route('api.fonctionnalites.habilitations.index', $fonctionnalite)
        );

        $response->assertOk()->assertSee($habilitations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_fonctionnalite_habilitations()
    {
        $fonctionnalite = Fonctionnalite::factory()->create();
        $data = Habilitation::factory()
            ->make([
                'fonctionnalite_id' => $fonctionnalite->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.fonctionnalites.habilitations.store', $fonctionnalite),
            $data
        );

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $habilitation = Habilitation::latest('id')->first();

        $this->assertEquals(
            $fonctionnalite->id,
            $habilitation->fonctionnalite_id
        );
    }
}
