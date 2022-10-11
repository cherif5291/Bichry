<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ClientsEntreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsEntrepriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientsEntreprise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'prenom' => $this->faker->text(255),
            'entreprise' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text,

            'titre' => $this->faker->text(255),

            'adresse' => $this->faker->text,
            'ville' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'code_postale' => $this->faker->text(255),
            'pays' => $this->faker->text(255),
            'note' => $this->faker->text,
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'paiements_mode_id' => \App\Models\PaiementsMode::factory(),
            'paiements_modalite_id' => \App\Models\PaiementsModalite::factory(),
            'devises_monetaire_id' => \App\Models\DevisesMonetaire::factory(),
        ];
    }
}
