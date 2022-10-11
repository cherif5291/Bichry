<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DocumentsType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentsTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_documents_types()
    {
        $documentsTypes = DocumentsType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('documents-types.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.documents_types.index')
            ->assertViewHas('documentsTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_documents_type()
    {
        $response = $this->get(route('documents-types.create'));

        $response->assertOk()->assertViewIs('app.documents_types.create');
    }

    /**
     * @test
     */
    public function it_stores_the_documents_type()
    {
        $data = DocumentsType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('documents-types.store'), $data);

        $this->assertDatabaseHas('documents_types', $data);

        $documentsType = DocumentsType::latest('id')->first();

        $response->assertRedirect(
            route('documents-types.edit', $documentsType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_documents_type()
    {
        $documentsType = DocumentsType::factory()->create();

        $response = $this->get(route('documents-types.show', $documentsType));

        $response
            ->assertOk()
            ->assertViewIs('app.documents_types.show')
            ->assertViewHas('documentsType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_documents_type()
    {
        $documentsType = DocumentsType::factory()->create();

        $response = $this->get(route('documents-types.edit', $documentsType));

        $response
            ->assertOk()
            ->assertViewIs('app.documents_types.edit')
            ->assertViewHas('documentsType');
    }

    /**
     * @test
     */
    public function it_updates_the_documents_type()
    {
        $documentsType = DocumentsType::factory()->create();

        $data = [
            'nom' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('documents-types.update', $documentsType),
            $data
        );

        $data['id'] = $documentsType->id;

        $this->assertDatabaseHas('documents_types', $data);

        $response->assertRedirect(
            route('documents-types.edit', $documentsType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_documents_type()
    {
        $documentsType = DocumentsType::factory()->create();

        $response = $this->delete(
            route('documents-types.destroy', $documentsType)
        );

        $response->assertRedirect(route('documents-types.index'));

        $this->assertDeleted($documentsType);
    }
}
