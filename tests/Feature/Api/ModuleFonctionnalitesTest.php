<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Module;
use App\Models\Fonctionnalite;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleFonctionnalitesTest extends TestCase
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
    public function it_gets_module_fonctionnalites()
    {
        $module = Module::factory()->create();
        $fonctionnalites = Fonctionnalite::factory()
            ->count(2)
            ->create([
                'module_id' => $module->id,
            ]);

        $response = $this->getJson(
            route('api.modules.fonctionnalites.index', $module)
        );

        $response->assertOk()->assertSee($fonctionnalites[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_module_fonctionnalites()
    {
        $module = Module::factory()->create();
        $data = Fonctionnalite::factory()
            ->make([
                'module_id' => $module->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modules.fonctionnalites.store', $module),
            $data
        );

        $this->assertDatabaseHas('fonctionnalites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $fonctionnalite = Fonctionnalite::latest('id')->first();

        $this->assertEquals($module->id, $fonctionnalite->module_id);
    }
}
