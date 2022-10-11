<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Module;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleTest extends TestCase
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
    public function it_gets_modules_list()
    {
        $modules = Module::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.modules.index'));

        $response->assertOk()->assertSee($modules[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_module()
    {
        $data = Module::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.modules.store'), $data);

        $this->assertDatabaseHas('modules', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_module()
    {
        $module = Module::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.modules.update', $module), $data);

        $data['id'] = $module->id;

        $this->assertDatabaseHas('modules', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_module()
    {
        $module = Module::factory()->create();

        $response = $this->deleteJson(route('api.modules.destroy', $module));

        $this->assertDeleted($module);

        $response->assertNoContent();
    }
}
