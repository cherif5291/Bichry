<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Devis;
use App\Models\DevisArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisDevisArticlesTest extends TestCase
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
    public function it_gets_devis_devis_articles()
    {
        $devis = Devis::factory()->create();
        $devisArticles = DevisArticle::factory()
            ->count(2)
            ->create([
                'devis_id' => $devis->id,
            ]);

        $response = $this->getJson(
            route('api.all-devis.devis-articles.index', $devis)
        );

        $response->assertOk()->assertSee($devisArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_devis_devis_articles()
    {
        $devis = Devis::factory()->create();
        $data = DevisArticle::factory()
            ->make([
                'devis_id' => $devis->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-devis.devis-articles.store', $devis),
            $data
        );

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $devisArticle = DevisArticle::latest('id')->first();

        $this->assertEquals($devis->id, $devisArticle->devis_id);
    }
}
