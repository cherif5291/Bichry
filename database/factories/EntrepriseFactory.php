<?php

namespace Database\Factories;

use App\Models\Entreprise;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entreprise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_entreprise' => $this->faker->text(255),
            'a_propos' => $this->faker->text,
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'adresse' => $this->faker->text,
            'capital' => $this->faker->randomNumber(2),
            'couleur_primaire' => $this->faker->text(255),
            'couleur_secondaire' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'modeles_devis_id' => \App\Models\ModelesDevis::factory(),
            'modeles_facture_id' => \App\Models\ModelesFacture::factory(),
            'modeles_recu_id' => \App\Models\ModelesRecu::factory(),
            'devises_monetaire_id' => \App\Models\DevisesMonetaire::factory(),
        ];
    }
}
