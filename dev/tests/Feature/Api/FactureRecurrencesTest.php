<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Facture;
use App\Models\Recurrence;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactureRecurrencesTest extends TestCase
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
    public function it_gets_facture_recurrences()
    {
        $facture = Facture::factory()->create();
        $recurrences = Recurrence::factory()
            ->count(2)
            ->create([
                'facture_id' => $facture->id,
            ]);

        $response = $this->getJson(
            route('api.factures.recurrences.index', $facture)
        );

        $response->assertOk()->assertSee($recurrences[0]->prochain_date);
    }

    /**
     * @test
     */
    public function it_stores_the_facture_recurrences()
    {
        $facture = Facture::factory()->create();
        $data = Recurrence::factory()
            ->make([
                'facture_id' => $facture->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.factures.recurrences.store', $facture),
            $data
        );

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recurrence = Recurrence::latest('id')->first();

        $this->assertEquals($facture->id, $recurrence->facture_id);
    }
}
