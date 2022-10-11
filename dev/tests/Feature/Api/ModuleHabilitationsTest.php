<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Module;
use App\Models\Habilitation;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleHabilitationsTest extends TestCase
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
    public function it_gets_module_habilitations()
    {
        $module = Module::factory()->create();
        $habilitations = Habilitation::factory()
            ->count(2)
            ->create([
                'module_id' => $module->id,
            ]);

        $response = $this->getJson(
            route('api.modules.habilitations.index', $module)
        );

        $response->assertOk()->assertSee($habilitations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_module_habilitations()
    {
        $module = Module::factory()->create();
        $data = Habilitation::factory()
            ->make([
                'module_id' => $module->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modules.habilitations.store', $module),
            $data
        );

        $this->assertDatabaseHas('habilitations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $habilitation = Habilitation::latest('id')->first();

        $this->assertEquals($module->id, $habilitation->module_id);
    }
}
