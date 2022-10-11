<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contrat;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseContratsTest extends TestCase
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
    public function it_gets_entreprise_contrats()
    {
        $entreprise = Entreprise::factory()->create();
        $contrats = Contrat::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.contrats.index', $entreprise)
        );

        $response->assertOk()->assertSee($contrats[0]->status);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_contrats()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Contrat::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.contrats.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('contrats', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $contrat = Contrat::latest('id')->first();

        $this->assertEquals($entreprise->id, $contrat->entreprise_id);
    }
}
