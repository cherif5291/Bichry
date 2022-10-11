<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Module;
use App\Models\ModulePack;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleModulePacksTest extends TestCase
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
    public function it_gets_module_module_packs()
    {
        $module = Module::factory()->create();
        $modulePacks = ModulePack::factory()
            ->count(2)
            ->create([
                'module_id' => $module->id,
            ]);

        $response = $this->getJson(
            route('api.modules.module-packs.index', $module)
        );

        $response->assertOk()->assertSee($modulePacks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_module_module_packs()
    {
        $module = Module::factory()->create();
        $data = ModulePack::factory()
            ->make([
                'module_id' => $module->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modules.module-packs.store', $module),
            $data
        );

        $this->assertDatabaseHas('module_packs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $modulePack = ModulePack::latest('id')->first();

        $this->assertEquals($module->id, $modulePack->module_id);
    }
}
