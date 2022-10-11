<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DevisArticle;

use App\Models\Taxe;
use App\Models\Devis;
use App\Models\Article;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisArticleControllerTest extends TestCase
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
    public function it_displays_index_view_with_devis_articles()
    {
        $devisArticles = DevisArticle::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('devis-articles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.devis_articles.index')
            ->assertViewHas('devisArticles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_devis_article()
    {
        $response = $this->get(route('devis-articles.create'));

        $response->assertOk()->assertViewIs('app.devis_articles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_devis_article()
    {
        $data = DevisArticle::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('devis-articles.store'), $data);

        $this->assertDatabaseHas('devis_articles', $data);

        $devisArticle = DevisArticle::latest('id')->first();

        $response->assertRedirect(route('devis-articles.edit', $devisArticle));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_devis_article()
    {
        $devisArticle = DevisArticle::factory()->create();

        $response = $this->get(route('devis-articles.show', $devisArticle));

        $response
            ->assertOk()
            ->assertViewIs('app.devis_articles.show')
            ->assertViewHas('devisArticle');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_devis_article()
    {
        $devisArticle = DevisArticle::factory()->create();

        $response = $this->get(route('devis-articles.edit', $devisArticle));

        $response
            ->assertOk()
            ->assertViewIs('app.devis_articles.edit')
            ->assertViewHas('devisArticle');
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

        $response = $this->put(
            route('devis-articles.update', $devisArticle),
            $data
        );

        $data['id'] = $devisArticle->id;

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertRedirect(route('devis-articles.edit', $devisArticle));
    }

    /**
     * @test
     */
    public function it_deletes_the_devis_article()
    {
        $devisArticle = DevisArticle::factory()->create();

        $response = $this->delete(
            route('devis-articles.destroy', $devisArticle)
        );

        $response->assertRedirect(route('devis-articles.index'));

        $this->assertDeleted($devisArticle);
    }
}
