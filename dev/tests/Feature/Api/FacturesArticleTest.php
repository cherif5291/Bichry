<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FacturesArticle;

use App\Models\Taxe;
use App\Models\Article;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturesArticleTest extends TestCase
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
    public function it_gets_factures_articles_list()
    {
        $facturesArticles = FacturesArticle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.factures-articles.index'));

        $response->assertOk()->assertSee($facturesArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_factures_article()
    {
        $data = FacturesArticle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.factures-articles.store'),
            $data
        );

        $this->assertDatabaseHas('factures_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_factures_article()
    {
        $facturesArticle = FacturesArticle::factory()->create();

        $article = Article::factory()->create();
        $taxe = Taxe::factory()->create();

        $data = [
            'qte' => $this->faker->randomNumber(0),
            'taux' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(2),
            'article_id' => $article->id,
            'taxe_id' => $taxe->id,
        ];

        $response = $this->putJson(
            route('api.factures-articles.update', $facturesArticle),
            $data
        );

        $data['id'] = $facturesArticle->id;

        $this->assertDatabaseHas('factures_articles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_factures_article()
    {
        $facturesArticle = FacturesArticle::factory()->create();

        $response = $this->deleteJson(
            route('api.factures-articles.destroy', $facturesArticle)
        );

        $this->assertDeleted($facturesArticle);

        $response->assertNoContent();
    }
}
