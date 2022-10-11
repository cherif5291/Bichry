<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rupture;

use App\Models\Invitation;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RuptureTest extends TestCase
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
    public function it_gets_ruptures_list()
    {
        $ruptures = Rupture::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ruptures.index'));

        $response->assertOk()->assertSee($ruptures[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_rupture()
    {
        $data = Rupture::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.ruptures.store'), $data);

        $this->assertDatabaseHas('ruptures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rupture()
    {
        $rupture = Rupture::factory()->create();

        $invitation = Invitation::factory()->create();
        $entreprise = Entreprise::factory()->create();

        $data = [
            'status' => $this->faker->word,
            'invitation_id' => $invitation->id,
            'entreprise_id' => $entreprise->id,
        ];

        $response = $this->putJson(
            route('api.ruptures.update', $rupture),
            $data
        );

        $data['id'] = $rupture->id;

        $this->assertDatabaseHas('ruptures', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rupture()
    {
        $rupture = Rupture::factory()->create();

        $response = $this->deleteJson(route('api.ruptures.destroy', $rupture));

        $this->assertDeleted($rupture);

        $response->assertNoContent();
    }
}
