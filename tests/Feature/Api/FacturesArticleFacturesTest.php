<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\FacturesArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacturesArticleFacturesTest extends TestCase
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
    public function it_gets_factures_article_factures()
    {
        $facturesArticle = FacturesArticle::factory()->create();
        $factures = Facture::factory()
            ->count(2)
            ->create([
                'factures_article_id' => $facturesArticle->id,
            ]);

        $response = $this->getJson(
            route('api.factures-articles.factures.index', $facturesArticle)
        );

        $response->assertOk()->assertSee($factures[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_factures_article_factures()
    {
        $facturesArticle = FacturesArticle::factory()->create();
        $data = Facture::factory()
            ->make([
                'factures_article_id' => $facturesArticle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.factures-articles.factures.store', $facturesArticle),
            $data
        );

        $this->assertDatabaseHas('factures', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facture = Facture::latest('id')->first();

        $this->assertEquals(
            $facturesArticle->id,
            $facture->factures_article_id
        );
    }
}
