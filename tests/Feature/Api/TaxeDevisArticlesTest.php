<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Taxe;
use App\Models\DevisArticle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxeDevisArticlesTest extends TestCase
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
    public function it_gets_taxe_devis_articles()
    {
        $taxe = Taxe::factory()->create();
        $devisArticles = DevisArticle::factory()
            ->count(2)
            ->create([
                'taxe_id' => $taxe->id,
            ]);

        $response = $this->getJson(
            route('api.taxes.devis-articles.index', $taxe)
        );

        $response->assertOk()->assertSee($devisArticles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_taxe_devis_articles()
    {
        $taxe = Taxe::factory()->create();
        $data = DevisArticle::factory()
            ->make([
                'taxe_id' => $taxe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.taxes.devis-articles.store', $taxe),
            $data
        );

        $this->assertDatabaseHas('devis_articles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $devisArticle = DevisArticle::latest('id')->first();

        $this->assertEquals($taxe->id, $devisArticle->taxe_id);
    }
}
