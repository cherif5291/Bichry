<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Article;
use App\Models\DevisArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleDevisArticlesTest extends TestCase
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
    public function it_gets_article_devis_articles()
    {
        $article = Article::factory()->create();
        $devisArticles = DevisArticle::factory()
            ->count(2)
            ->create([
                'article_id' => $article->id,
            ]);

        $response = $this->getJson(
            route('api.articles.devis-articles.index', $article)
        );

        $response->assertOk()->assertSee($devisArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_article_devis_articles()
    {
        $article = Article::factory()->create();
        $data = DevisArticle::factory()
            ->make([
                'article_id' => $article->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.articles.devis-articles.store', $article),
            $data
        );

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $devisArticle = DevisArticle::latest('id')->first();

        $this->assertEquals($article->id, $devisArticle->article_id);
    }
}
