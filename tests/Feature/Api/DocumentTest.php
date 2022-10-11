<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Document;

use App\Models\Entreprise;
use App\Models\DocumentsType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentTest extends TestCase
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
    public function it_gets_documents_list()
    {
        $documents = Document::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.documents.index'));

        $response->assertOk()->assertSee($documents[0]->doc);
    }

    /**
     * @test
     */
    public function it_stores_the_document()
    {
        $data = Document::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.documents.store'), $data);

        $this->assertDatabaseHas('documents', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.documents.update', $document),
            $data
        );

        $data['id'] = $document->id;

        $this->assertDatabaseHas('documents', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_document()
    {
        $document = Document::factory()->create();

        $response = $this->deleteJson(
            route('api.documents.destroy', $document)
        );

        $this->assertDeleted($document);

        $response->assertNoContent();
    }
}
