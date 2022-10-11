<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Project;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsEntrepriseProjectsTest extends TestCase
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
    public function it_gets_clients_entreprise_projects()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $projects = Project::factory()
            ->count(2)
            ->create([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ]);

        $response = $this->getJson(
            route('api.clients-entreprises.projects.index', $clientsEntreprise)
        );

        $response->assertOk()->assertSee($projects[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_clients_entreprise_projects()
    {
        $clientsEntreprise = ClientsEntreprise::factory()->create();
        $data = Project::factory()
            ->make([
                'clients_entreprise_id' => $clientsEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.clients-entreprises.projects.store', $clientsEntreprise),
            $data
        );

        $this->assertDatabaseHas('projects', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $project = Project::latest('id')->first();

        $this->assertEquals(
            $clientsEntreprise->id,
            $project->clients_entreprise_id
        );
    }
}
