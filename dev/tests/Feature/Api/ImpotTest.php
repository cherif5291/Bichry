<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Impot;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImpotTest extends TestCase
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
    public function it_gets_impots_list()
    {
        $impots = Impot::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.impots.index'));

        $response->assertOk()->assertSee($impots[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_impot()
    {
        $data = Impot::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.impots.store'), $data);

        $this->assertDatabaseHas('impots', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_impot()
    {
        $impot = Impot::factory()->create();

        $data = [];

        $response = $this->putJson(route('api.impots.update', $impot), $data);

        $data['id'] = $impot->id;

        $this->assertDatabaseHas('impots', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_impot()
    {
        $impot = Impot::factory()->create();

        $response = $this->deleteJson(route('api.impots.destroy', $impot));

        $this->assertDeleted($impot);

        $response->assertNoContent();
    }
}
