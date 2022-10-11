<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Document;

use App\Models\Entreprise;
use App\Models\DocumentsType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentControllerTest extends TestCase
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
    public function it_displays_index_view_with_documents()
    {
        $documents = Document::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('documents.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.documents.index')
            ->assertViewHas('documents');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_document()
    {
        $response = $this->get(route('documents.create'));

        $response->assertOk()->assertViewIs('app.documents.create');
    }

    /**
     * @test
     */
    public function it_stores_the_document()
    {
        $data = Document::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('documents.store'), $data);

        $this->assertDatabaseHas('documents', $data);

        $document = Document::latest('id')->first();

        $response->assertRedirect(route('documents.edit', $document));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_document()
    {
        $document = Document::factory()->create();

        $response = $this->get(route('documents.show', $document));

        $response
            ->assertOk()
            ->assertViewIs('app.documents.show')
            ->assertViewHas('document');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_document()
    {
        $document = Document::factory()->create();

        $response = $this->get(route('documents.edit', $document));

        $response
            ->assertOk()
            ->assertViewIs('app.documents.edit')
            ->assertViewHas('document');
    }

    /**
     * @test
     */
    public function it_updates_the_document()
    {
        $document = Document::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $documentsType = DocumentsType::factory()->create();

        $data = [
            'doc' => $this->faker->text,
            'cabinet_id' => $this->faker->randomNumber(0),
            'entreprise_id' => $entreprise->id,
            'documents_type_id' => $documentsType->id,
        ];

        $response = $this->put(route('documents.update', $document), $data);

        $data['id'] = $document->id;

        $this->assertDatabaseHas('documents', $data);

        $response->assertRedirect(route('documents.edit', $document));
    }

    /**
     * @test
     */
    public function it_deletes_the_document()
    {
        $document = Document::factory()->create();

        $response = $this->delete(route('documents.destroy', $document));

        $response->assertRedirect(route('documents.index'));

        $this->assertDeleted($document);
    }
}
