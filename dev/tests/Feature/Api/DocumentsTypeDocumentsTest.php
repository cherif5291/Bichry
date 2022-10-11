<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Document;
use App\Models\DocumentsType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentsTypeDocumentsTest extends TestCase
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
    public function it_gets_documents_type_documents()
    {
        $documentsType = DocumentsType::factory()->create();
        $documents = Document::factory()
            ->count(2)
            ->create([
                'documents_type_id' => $documentsType->id,
            ]);

        $response = $this->getJson(
            route('api.documents-types.documents.index', $documentsType)
        );

        $response->assertOk()->assertSee($documents[0]->doc);
    }

    /**
     * @test
     */
    public function it_stores_the_documents_type_documents()
    {
        $documentsType = DocumentsType::factory()->create();
        $data = Document::factory()
            ->make([
                'documents_type_id' => $documentsType->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.documents-types.documents.store', $documentsType),
            $data
        );

        $this->assertDatabaseHas('documents', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $document = Document::latest('id')->first();

        $this->assertEquals($documentsType->id, $document->documents_type_id);
    }
}
