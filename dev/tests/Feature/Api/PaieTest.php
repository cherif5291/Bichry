<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Paie;

use App\Models\EmployesEntreprise;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaieTest extends TestCase
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
    public function it_gets_paies_list()
    {
        $paies = Paie::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.paies.index'));

        $response->assertOk()->assertSee($paies[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_paie()
    {
        $data = Paie::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.paies.store'), $data);

        $this->assertDatabaseHas('paies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_paie()
    {
        $paie = Paie::factory()->create();

        $employesEntreprise = EmployesEntreprise::factory()->create();

        $data = [
            'date' => $this->faker->date,
            'montant_paye' => $this->faker->randomNumber(2),
            'restant' => $this->faker->randomNumber(2),
            'employes_entreprise_id' => $employesEntreprise->id,
        ];

        $response = $this->putJson(route('api.paies.update', $paie), $data);

        $data['id'] = $paie->id;

        $this->assertDatabaseHas('paies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_paie()
    {
        $paie = Paie::factory()->create();

        $response = $this->deleteJson(route('api.paies.destroy', $paie));

        $this->assertDeleted($paie);

        $response->assertNoContent();
    }
}
