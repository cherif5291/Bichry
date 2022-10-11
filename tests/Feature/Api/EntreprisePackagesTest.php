<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Package;
use App\Models\Entreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntreprisePackagesTest extends TestCase
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
    public function it_gets_entreprise_packages()
    {
        $entreprise = Entreprise::factory()->create();
        $packages = Package::factory()
            ->count(2)
            ->create([
                'entreprise_id' => $entreprise->id,
            ]);

        $response = $this->getJson(
            route('api.entreprises.packages.index', $entreprise)
        );

        $response->assertOk()->assertSee($packages[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_entreprise_packages()
    {
        $entreprise = Entreprise::factory()->create();
        $data = Package::factory()
            ->make([
                'entreprise_id' => $entreprise->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.entreprises.packages.store', $entreprise),
            $data
        );

        $this->assertDatabaseHas('packages', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $package = Package::latest('id')->first();

        $this->assertEquals($entreprise->id, $package->entreprise_id);
    }
}
