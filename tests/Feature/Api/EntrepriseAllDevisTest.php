<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Devis;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntrepriseAllDevisTest extends TestCase
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
    public function it_gets_entreprise_all_devis()
    {
        $entreprise = Entreprise::factory()->create();
        $allDevis = Devis::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.all-devis.index', $entreprise)
        );

        $response->assertOk()->assertSee($allDevis[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_all_devis()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Devis::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.all-devis.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('devis', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $devis = Devis::latest('id')->first();

        $this->assertEquals($entreprise->id, $devis->entreprise_id);
    }
}
