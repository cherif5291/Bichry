<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DocumentsType;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentsTypeTest extends TestCase
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
    public function it_gets_documents_types_list()
    {
        $documentsTypes = DocumentsType::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.documents-types.index'));

        $response->assertOk()->assertSee($documentsTypes[0]->nom);
    }

    /**
     * @test
     */
    public function it_stores_the_documents_type()
    {
        $data = DocumentsType::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.documents-types.store'), $data);

        $this->assertDatabaseHas('documents_types', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.documents-types.update', $documentsType),
            $data
        );

        $data['id'] = $documentsType->id;

        $this->assertDatabaseHas('documents_types', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_documents_type()
    {
        $documentsType = DocumentsType::factory()->create();

        $response = $this->deleteJson(
            route('api.documents-types.destroy', $documentsType)
        );

        $this->assertDeleted($documentsType);

        $response->assertNoContent();
    }
}
