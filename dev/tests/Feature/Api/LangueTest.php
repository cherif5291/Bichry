<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Langue;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangueTest extends TestCase
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
    public function it_gets_langues_list()
    {
        $langues = Langue::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.langues.index'));

        $response->assertOk()->assertSee($langues[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_langue()
    {
        $data = Langue::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.langues.store'), $data);

        $this->assertDatabaseHas('langues', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_langue()
    {
        $langue = Langue::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
            'traduction' => $this->faker->text,
        ];

        $response = $this->putJson(route('api.langues.update', $langue), $data);

        $data['id'] = $langue->id;

        $this->assertDatabaseHas('langues', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_langue()
    {
        $langue = Langue::factory()->create();

        $response = $this->deleteJson(route('api.langues.destroy', $langue));

        $this->assertDeleted($langue);

        $response->assertNoContent();
    }
}
