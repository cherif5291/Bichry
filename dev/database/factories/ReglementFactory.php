<?php

namespace Database\Factories;

use App\Models\Reglement;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReglementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reglement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->text(255),
            'cc_cci' => $this->faker->text(255),
            'approvisionnememnt' => $this->faker->text(255),
            'montant_recu' => $this->faker->randomNumber(2),
            'note' => $this->faker->text,
            'facture_id' => \App\Models\Facture::factory(),
            'paiements_mode_id' => \App\Models\PaiementsMode::factory(),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'banque_id' => \App\Models\Banque::factory(),
            'caisse_id' => \App\Models\Caisse::factory(),
        ];
    }
}
