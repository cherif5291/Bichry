<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Recurrence;

use App\Models\Paie;
use App\Models\Regle;
use App\Models\Facture;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecurrenceControllerTest extends TestCase
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
    public function it_displays_index_view_with_recurrences()
    {
        $recurrences = Recurrence::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('recurrences.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.recurrences.index')
            ->assertViewHas('recurrences');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_recurrence()
    {
        $response = $this->get(route('recurrences.create'));

        $response->assertOk()->assertViewIs('app.recurrences.create');
    }

    /**
     * @test
     */
    public function it_stores_the_recurrence()
    {
        $data = Recurrence::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('recurrences.store'), $data);

        $this->assertDatabaseHas('recurrences', $data);

        $recurrence = Recurrence::latest('id')->first();

        $response->assertRedirect(route('recurrences.edit', $recurrence));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_recurrence()
    {
        $recurrence = Recurrence::factory()->create();

        $response = $this->get(route('recurrences.show', $recurrence));

        $response
            ->assertOk()
            ->assertViewIs('app.recurrences.show')
            ->assertViewHas('recurrence');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_recurrence()
    {
        $recurrence = Recurrence::factory()->create();

        $response = $this->get(route('recurrences.edit', $recurrence));

        $response
            ->assertOk()
            ->assertViewIs('app.recurrences.edit')
            ->assertViewHas('recurrence');
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

        $response = $this->put(route('recurrences.update', $recurrence), $data);

        $data['id'] = $recurrence->id;

        $this->assertDatabaseHas('recurrences', $data);

        $response->assertRedirect(route('recurrences.edit', $recurrence));
    }

    /**
     * @test
     */
    public function it_deletes_the_recurrence()
    {
        $recurrence = Recurrence::factory()->create();

        $response = $this->delete(route('recurrences.destroy', $recurrence));

        $response->assertRedirect(route('recurrences.index'));

        $this->assertDeleted($recurrence);
    }
}
