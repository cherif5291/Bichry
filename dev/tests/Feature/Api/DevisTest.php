<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Devis;

use App\Models\Entreprise;
use App\Models\ClientsEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevisTest extends TestCase
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
    public function it_gets_all_devis_list()
    {
        $allDevis = Devis::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-devis.index'));

        $response->assertOk()->assertSee($allDevis[0]->cc_cci);
    }

    /**
     * @test
     */
    public function it_stores_the_devis()
    {
        $data = Devis::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-devis.store'), $data);

        $this->assertDatabaseHas('devis', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.all-devis.update', $devis),
            $data
        );

        $data['id'] = $devis->id;

        $this->assertDatabaseHas('devis', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_devis()
    {
        $devis = Devis::factory()->create();

        $response = $this->deleteJson(route('api.all-devis.destroy', $devis));

        $this->assertDeleted($devis);

        $response->assertNoContent();
    }
}
