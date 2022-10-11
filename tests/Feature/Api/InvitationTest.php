<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Invitation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationTest extends TestCase
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
    public function it_gets_invitations_list()
    {
        $invitations = Invitation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.invitations.index'));

        $response->assertOk()->assertSee($invitations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_invitation()
    {
        $data = Invitation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.invitations.store'), $data);

        $this->assertDatabaseHas('invitations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_invitation()
    {
        $invitation = Invitation::factory()->create();

        $data = [
            'invitant_id' => $this->faker->randomNumber(0),
            'invite_id' => $this->faker->randomNumber(0),
        ];

        $response = $this->putJson(
            route('api.invitations.update', $invitation),
            $data
        );

        $data['id'] = $invitation->id;

        $this->assertDatabaseHas('invitations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_invitation()
    {
        $invitation = Invitation::factory()->create();

        $response = $this->deleteJson(
            route('api.invitations.destroy', $invitation)
        );

        $this->assertDeleted($invitation);

        $response->assertNoContent();
    }
}
