<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ModulePack;

use App\Models\Module;
use App\Models\Package;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModulePackTest extends TestCase
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
    public function it_gets_module_packs_list()
    {
        $modulePacks = ModulePack::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.module-packs.index'));

        $response->assertOk()->assertSee($modulePacks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_module_pack()
    {
        $data = ModulePack::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.module-packs.store'), $data);

        $this->assertDatabaseHas('module_packs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_module_pack()
    {
        $modulePack = ModulePack::factory()->create();

        $package = Package::factory()->create();
        $module = Module::factory()->create();

        $data = [
            'package_id' => $package->id,
            'module_id' => $module->id,
        ];

        $response = $this->putJson(
            route('api.module-packs.update', $modulePack),
            $data
        );

        $data['id'] = $modulePack->id;

        $this->assertDatabaseHas('module_packs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_module_pack()
    {
        $modulePack = ModulePack::factory()->create();

        $response = $this->deleteJson(
            route('api.module-packs.destroy', $modulePack)
        );

        $this->assertDeleted($modulePack);

        $response->assertNoContent();
    }
}
