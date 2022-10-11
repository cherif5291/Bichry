<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ModulePack;

use App\Models\Module;
use App\Models\Package;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModulePackControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_module_packs()
    {
        $modulePacks = ModulePack::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('module-packs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.module_packs.index')
            ->assertViewHas('modulePacks');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_module_pack()
    {
        $response = $this->get(route('module-packs.create'));

        $response->assertOk()->assertViewIs('app.module_packs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_module_pack()
    {
        $data = ModulePack::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('module-packs.store'), $data);

        $this->assertDatabaseHas('module_packs', $data);

        $modulePack = ModulePack::latest('id')->first();

        $response->assertRedirect(route('module-packs.edit', $modulePack));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_module_pack()
    {
        $modulePack = ModulePack::factory()->create();

        $response = $this->get(route('module-packs.show', $modulePack));

        $response
            ->assertOk()
            ->assertViewIs('app.module_packs.show')
            ->assertViewHas('modulePack');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_module_pack()
    {
        $modulePack = ModulePack::factory()->create();

        $response = $this->get(route('module-packs.edit', $modulePack));

        $response
            ->assertOk()
            ->assertViewIs('app.module_packs.edit')
            ->assertViewHas('modulePack');
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

        $response = $this->put(
            route('module-packs.update', $modulePack),
            $data
        );

        $data['id'] = $modulePack->id;

        $this->assertDatabaseHas('module_packs', $data);

        $response->assertRedirect(route('module-packs.edit', $modulePack));
    }

    /**
     * @test
     */
    public function it_deletes_the_module_pack()
    {
        $modulePack = ModulePack::factory()->create();

        $response = $this->delete(route('module-packs.destroy', $modulePack));

        $response->assertRedirect(route('module-packs.index'));

        $this->assertDeleted($modulePack);
    }
}
