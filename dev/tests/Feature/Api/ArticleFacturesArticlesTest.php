<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Article;
use App\Models\FacturesArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleFacturesArticlesTest extends TestCase
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
    public function it_gets_article_factures_articles()
    {
        $article = Article::factory()->create();
        $facturesArticles = FacturesArticle::factory()
            ->count(2)
            ->create([
                'article_id' => $article->id,
            ]);

        $response = $this->getJson(
            route('api.articles.factures-articles.index', $article)
        );

        $response->assertOk()->assertSee($facturesArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_article_factures_articles()
    {
        $article = Article::factory()->create();
        $data = FacturesArticle::factory()
            ->make([
                'article_id' => $article->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.articles.factures-articles.store', $article),
            $data
        );

        $this->assertDatabaseHas('factures_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facturesArticle = FacturesArticle::latest('id')->first();

        $this->assertEquals($article->id, $facturesArticle->article_id);
    }
}
