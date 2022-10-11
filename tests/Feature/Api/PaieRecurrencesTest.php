<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Paie;
use App\Models\Recurrence;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaieRecurrencesTest extends TestCase
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
    public function it_gets_paie_recurrences()
    {
        $paie = Paie::factory()->create();
        $recurrences = Recurrence::factory()
            ->count(2)
            ->create([
                'paie_id' => $paie->id,
            ]);

        $response = $this->getJson(route('api.paies.recurrences.index', $paie));

        $response->assertOk()->assertSee($recurrences[0]->prochain_date);
    }

    /**
     * @test
     */
    public function it_stores_the_paie_recurrences()
    {
        $paie = Paie::factory()->create();
        $data = Recurrence::factory()
            ->make([
                'paie_id' => $paie->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.paies.recurrences.store', $paie),
            $data
        );

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $recurrence = Recurrence::latest('id')->first();

        $this->assertEquals($paie->id, $recurrence->paie_id);
    }
}
