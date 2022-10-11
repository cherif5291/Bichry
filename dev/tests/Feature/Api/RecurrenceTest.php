<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Recurrence;

use App\Models\Paie;
use App\Models\Regle;
use App\Models\Facture;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecurrenceTest extends TestCase
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
    public function it_gets_recurrences_list()
    {
        $recurrences = Recurrence::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.recurrences.index'));

        $response->assertOk()->assertSee($recurrences[0]->prochain_date);
    }

    /**
     * @test
     */
    public function it_stores_the_recurrence()
    {
        $data = Recurrence::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.recurrences.store'), $data);

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_recurrence()
    {
        $recurrence = Recurrence::factory()->create();

        $facture = Facture::factory()->create();
        $paie = Paie::factory()->create();
        $regle = Regle::factory()->create();

        $data = [
            'interval_jour' => $this->faker->randomNumber(0),
            'prochain_date' => $this->faker->date,
            'facture_id' => $facture->id,
            'paie_id' => $paie->id,
            'regle_id' => $regle->id,
        ];

        $response = $this->putJson(
            route('api.recurrences.update', $recurrence),
            $data
        );

        $data['id'] = $recurrence->id;

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_recurrence()
    {
        $recurrence = Recurrence::factory()->create();

        $response = $this->deleteJson(
            route('api.recurrences.destroy', $recurrence)
        );

        $this->assertDeleted($recurrence);

        $response->assertNoContent();
    }
}
