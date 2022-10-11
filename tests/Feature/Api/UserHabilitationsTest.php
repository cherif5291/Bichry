<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Habilitation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserHabilitationsTest extends TestCase
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
    public function it_gets_user_habilitations()
    {
        $user = User::factory()->create();
        $habilitations = Habilitation::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.habilitations.index', $user)
        );

        $response->assertOk()->assertSee($habilitations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_habilitations()
    {
        $user = User::factory()->create();
        $data = Habilitation::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.habilitations.store', $user),
            $data
        );

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $habilitation = Habilitation::latest('id')->first();

        $this->assertEquals($user->id, $habilitation->user_id);
    }
}
