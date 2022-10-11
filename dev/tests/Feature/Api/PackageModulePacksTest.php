<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Package;
use App\Models\ModulePack;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PackageModulePacksTest extends TestCase
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
    public function it_gets_package_module_packs()
    {
        $package = Package::factory()->create();
        $modulePacks = ModulePack::factory()
            ->count(2)
            ->create([
                'package_id' => $package->id,
            ]);

        $response = $this->getJson(
            route('api.packages.module-packs.index', $package)
        );

        $response->assertOk()->assertSee($modulePacks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_package_module_packs()
    {
        $package = Package::factory()->create();
        $data = ModulePack::factory()
            ->make([
                'package_id' => $package->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.packages.module-packs.store', $package),
            $data
        );

        $this->assertDatabaseHas('module_packs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $modulePack = ModulePack::latest('id')->first();

        $this->assertEquals($package->id, $modulePack->package_id);
    }
}
