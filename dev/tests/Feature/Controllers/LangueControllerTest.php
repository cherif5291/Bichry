<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Langue;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LangueControllerTest extends TestCase
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
    public function it_displays_index_view_with_langues()
    {
        $langues = Langue::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('langues.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.langues.index')
            ->assertViewHas('langues');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_langue()
    {
        $response = $this->get(route('langues.create'));

        $response->assertOk()->assertViewIs('app.langues.create');
    }

    /**
     * @test
     */
    public function it_stores_the_langue()
    {
        $data = Langue::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('langues.store'), $data);

        $this->assertDatabaseHas('langues', $data);

        $langue = Langue::latest('id')->first();

        $response->assertRedirect(route('langues.edit', $langue));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_langue()
    {
        $langue = Langue::factory()->create();

        $response = $this->get(route('langues.show', $langue));

        $response
            ->assertOk()
            ->assertViewIs('app.langues.show')
            ->assertViewHas('langue');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_langue()
    {
        $langue = Langue::factory()->create();

        $response = $this->get(route('langues.edit', $langue));

        $response
            ->assertOk()
            ->assertViewIs('app.langues.edit')
            ->assertViewHas('langue');
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

        $response = $this->put(route('langues.update', $langue), $data);

        $data['id'] = $langue->id;

        $this->assertDatabaseHas('langues', $data);

        $response->assertRedirect(route('langues.edit', $langue));
    }

    /**
     * @test
     */
    public function it_deletes_the_langue()
    {
        $langue = Langue::factory()->create();

        $response = $this->delete(route('langues.destroy', $langue));

        $response->assertRedirect(route('langues.index'));

        $this->assertDeleted($langue);
    }
}
