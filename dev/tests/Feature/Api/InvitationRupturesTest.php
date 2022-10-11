<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rupture;
use App\Models\Invitation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationRupturesTest extends TestCase
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
    public function it_gets_invitation_ruptures()
    {
        $invitation = Invitation::factory()->create();
        $ruptures = Rupture::factory()
            ->count(2)
            ->create([
                'invitation_id' => $invitation->id,
            ]);

        $response = $this->getJson(
            route('api.invitations.ruptures.index', $invitation)
        );

        $response->assertOk()->assertSee($ruptures[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_invitation_ruptures()
    {
        $invitation = Invitation::factory()->create();
        $data = Rupture::factory()
            ->make([
                'invitation_id' => $invitation->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.invitations.ruptures.store', $invitation),
            $data
        );

        $this->assertDatabaseHas('ruptures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $rupture = Rupture::latest('id')->first();

        $this->assertEquals($invitation->id, $rupture->invitation_id);
    }
}
