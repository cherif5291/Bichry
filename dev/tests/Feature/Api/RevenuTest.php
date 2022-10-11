<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Revenu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RevenuTest extends TestCase
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
    public function it_gets_revenus_list()
    {
        $revenus = Revenu::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.revenus.index'));

        $response->assertOk()->assertSee($revenus[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_revenu()
    {
        $data = Revenu::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.revenus.store'), $data);

        $this->assertDatabaseHas('revenus', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_revenu()
    {
        $revenu = Revenu::factory()->create();

        $data = [];

        $response = $this->putJson(route('api.revenus.update', $revenu), $data);

        $data['id'] = $revenu->id;

        $this->assertDatabaseHas('revenus', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_revenu()
    {
        $revenu = Revenu::factory()->create();

        $response = $this->deleteJson(route('api.revenus.destroy', $revenu));

        $this->assertDeleted($revenu);

        $response->assertNoContent();
    }
}
