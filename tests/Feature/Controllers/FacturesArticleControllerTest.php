<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FacturesArticle;

use App\Models\Taxe;
use App\Models\Article;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturesArticleControllerTest extends TestCase
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
    public function it_displays_index_view_with_factures_articles()
    {
        $facturesArticles = FacturesArticle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('factures-articles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.factures_articles.index')
            ->assertViewHas('facturesArticles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_factures_article()
    {
        $response = $this->get(route('factures-articles.create'));

        $response->assertOk()->assertViewIs('app.factures_articles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_factures_article()
    {
        $data = FacturesArticle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('factures-articles.store'), $data);

        $this->assertDatabaseHas('factures_articles', $data);

        $facturesArticle = FacturesArticle::latest('id')->first();

        $response->assertRedirect(
            route('factures-articles.edit', $facturesArticle)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_factures_article()
    {
        $facturesArticle = FacturesArticle::factory()->create();

        $response = $this->get(
            route('factures-articles.show', $facturesArticle)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.factures_articles.show')
            ->assertViewHas('facturesArticle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_factures_article()
    {
        $facturesArticle = FacturesArticle::factory()->create();

        $response = $this->get(
            route('factures-articles.edit', $facturesArticle)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.factures_articles.edit')
            ->assertViewHas('facturesArticle');
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

        $response = $this->put(
            route('factures-articles.update', $facturesArticle),
            $data
        );

        $data['id'] = $facturesArticle->id;

        $this->assertDatabaseHas('factures_articles', $data);

        $response->assertRedirect(
            route('factures-articles.edit', $facturesArticle)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_factures_article()
    {
        $facturesArticle = FacturesArticle::factory()->create();

        $response = $this->delete(
            route('factures-articles.destroy', $facturesArticle)
        );

        $response->assertRedirect(route('factures-articles.index'));

        $this->assertDeleted($facturesArticle);
    }
}
