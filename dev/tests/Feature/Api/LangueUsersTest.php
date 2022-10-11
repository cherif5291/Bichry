<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Langue;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangueUsersTest extends TestCase
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
    public function it_gets_langue_users()
    {
        $langue = Langue::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'langue_id' => $langue->id,
            ]);

        $response = $this->getJson(route('api.langues.users.index', $langue));

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_langue_users()
    {
        $langue = Langue::factory()->create();
        $data = User::factory()
            ->make([
                'langue_id' => $langue->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.langues.users.store', $langue),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($langue->id, $user->langue_id);
    }
}
