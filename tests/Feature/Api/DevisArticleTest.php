<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DevisArticle;

use App\Models\Taxe;
use App\Models\Devis;
use App\Models\Article;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisArticleTest extends TestCase
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
    public function it_gets_devis_articles_list()
    {
        $devisArticles = DevisArticle::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.devis-articles.index'));

        $response->assertOk()->assertSee($devisArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_devis_article()
    {
        $data = DevisArticle::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.devis-articles.store'), $data);

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_devis_article()
    {
        $devisArticle = DevisArticle::factory()->create();

        $devis = Devis::factory()->create();
        $article = Article::factory()->create();
        $taxe = Taxe::factory()->create();

        $data = [
            'qte' => $this->faker->randomNumber(0),
            'taux' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(2),
            'devis_id' => $devis->id,
            'article_id' => $article->id,
            'taxe_id' => $taxe->id,
        ];

        $response = $this->putJson(
            route('api.devis-articles.update', $devisArticle),
            $data
        );

        $data['id'] = $devisArticle->id;

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_devis_article()
    {
        $devisArticle = DevisArticle::factory()->create();

        $response = $this->deleteJson(
            route('api.devis-articles.destroy', $devisArticle)
        );

        $this->assertDeleted($devisArticle);

        $response->assertNoContent();
    }
}
