<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Regle;
use App\Models\Recurrence;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegleRecurrencesTest extends TestCase
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
    public function it_gets_regle_recurrences()
    {
        $regle = Regle::factory()->create();
        $recurrences = Recurrence::factory()
            ->count(2)
            ->create([
                'regle_id' => $regle->id,
            ]);

        $response = $this->getJson(
            route('api.regles.recurrences.index', $regle)
        );

        $response->assertOk()->assertSee($recurrences[0]->prochain_date);
    }

    /**
     * @test
     */
    public function it_stores_the_regle_recurrences()
    {
        $regle = Regle::factory()->create();
        $data = Recurrence::factory()
            ->make([
                'regle_id' => $regle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.regles.recurrences.store', $regle),
            $data
        );

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recurrence = Recurrence::latest('id')->first();

        $this->assertEquals($regle->id, $recurrence->regle_id);
    }
}
