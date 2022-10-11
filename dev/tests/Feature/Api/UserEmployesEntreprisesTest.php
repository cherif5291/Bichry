<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEmployesEntreprisesTest extends TestCase
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
    public function it_gets_user_employes_entreprises()
    {
        $user = User::factory()->create();
        $employesEntreprises = EmployesEntreprise::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.employes-entreprises.index', $user)
        );

        $response->assertOk()->assertSee($employesEntreprises[0]->prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_user_employes_entreprises()
    {
        $user = User::factory()->create();
        $data = EmployesEntreprise::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.employes-entreprises.store', $user),
            $data
        );

        $this->assertDatabaseHas('employes_entreprises', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $employesEntreprise = EmployesEntreprise::latest('id')->first();

        $this->assertEquals($user->id, $employesEntreprise->user_id);
    }
}
