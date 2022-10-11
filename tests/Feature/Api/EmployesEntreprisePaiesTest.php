<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Paie;
use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployesEntreprisePaiesTest extends TestCase
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
    public function it_gets_employes_entreprise_paies()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $paies = Paie::factory()
            ->count(2)
            ->create([
                'employes_entreprise_id' => $employesEntreprise->id,
            ]);

        $response = $this->getJson(
            route('api.employes-entreprises.paies.index', $employesEntreprise)
        );

        $response->assertOk()->assertSee($paies[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_employes_entreprise_paies()
    {
        $employesEntreprise = EmployesEntreprise::factory()->create();
        $data = Paie::factory()
            ->make([
                'employes_entreprise_id' => $employesEntreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.employes-entreprises.paies.store', $employesEntreprise),
            $data
        );

        $this->assertDatabaseHas('paies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $paie = Paie::latest('id')->first();

        $this->assertEquals(
            $employesEntreprise->id,
            $paie->employes_entreprise_id
        );
    }
}
