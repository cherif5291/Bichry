<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Taxe;
use App\Models\FacturesArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxeFacturesArticlesTest extends TestCase
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
    public function it_gets_taxe_factures_articles()
    {
        $taxe = Taxe::factory()->create();
        $facturesArticles = FacturesArticle::factory()
            ->count(2)
            ->create([
                'taxe_id' => $taxe->id,
            ]);

        $response = $this->getJson(
            route('api.taxes.factures-articles.index', $taxe)
        );

        $response->assertOk()->assertSee($facturesArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_taxe_factures_articles()
    {
        $taxe = Taxe::factory()->create();
        $data = FacturesArticle::factory()
            ->make([
                'taxe_id' => $taxe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.taxes.factures-articles.store', $taxe),
            $data
        );

        $this->assertDatabaseHas('factures_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $facturesArticle = FacturesArticle::latest('id')->first();

        $this->assertEquals($taxe->id, $facturesArticle->taxe_id);
    }
}
