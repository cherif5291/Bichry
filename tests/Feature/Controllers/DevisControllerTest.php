<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Devis;

use App\Models\Entreprise;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_devis()
    {
        $allDevis = Devis::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-devis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_devis.index')
            ->assertViewHas('allDevis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_devis()
    {
        $response = $this->get(route('all-devis.create'));

        $response->assertOk()->assertViewIs('app.all_devis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_devis()
    {
        $data = Devis::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-devis.store'), $data);

        $this->assertDatabaseHas('devis', $data);

        $devis = Devis::latest('id')->first();

        $response->assertRedirect(route('all-devis.edit', $devis));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_devis()
    {
        $devis = Devis::factory()->create();

        $response = $this->get(route('all-devis.show', $devis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_devis.show')
            ->assertViewHas('devis');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_devis()
    {
        $devis = Devis::factory()->create();

        $response = $this->get(route('all-devis.edit', $devis));

        $response
            ->assertOk()
            ->assertViewIs('app.all_devis.edit')
            ->assertViewHas('devis');
    }

    /**
     * @test
     */
    public function it_updates_the_devis()
    {
        $devis = Devis::factory()->create();

        $entreprise = Entreprise::factory()->create();
        $clientsEntreprise = ClientsEntreprise::factory()->create();

        $data = [
            'cc_cci' => $this->faker->text,
            'adresse_facturation' => $this->faker->text,
            'expiration' => $this->faker->date,
            'numero_devis' => $this->faker->randomNumber,
            'message_devis' => $this->faker->text,
            'message_releve' => $this->faker->text,
            'status' => $this->faker->word,
            'entreprise_id' => $entreprise->id,
            'clients_entreprise_id' => $clientsEntreprise->id,
        ];

        $response = $this->put(route('all-devis.update', $devis), $data);

        $data['id'] = $devis->id;

        $this->assertDatabaseHas('devis', $data);

        $response->assertRedirect(route('all-devis.edit', $devis));
    }

    /**
     * @test
     */
    public function it_deletes_the_devis()
    {
        $devis = Devis::factory()->create();

        $response = $this->delete(route('all-devis.destroy', $devis));

        $response->assertRedirect(route('all-devis.index'));

        $this->assertDeleted($devis);
    }
}
