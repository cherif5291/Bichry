<?php

namespace Database\Factories;

use App\Models\Fournisseur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FournisseurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fournisseur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prenom' => $this->faker->text(255),
            'nom' => $this->faker->text(255),
            'entreprise' => $this->faker->text(255),

            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),

            'titre' => $this->faker->text(255),
            'adresse' => $this->faker->text(255),
            'ville' => $this->faker->text(255),
            'province' => $this->faker->text(255),
            'code_postal' => $this->faker->text(255),
            'pays' => $this->faker->text(255),
            'note' => $this->faker->text,
            'numero_compte' => $this->faker->text(255),
            'solde_ouverture' => $this->faker->randomNumber(2),
            'date_ouverture' => $this->faker->date,
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'paiements_modalite_id' => \App\Models\PaiementsModalite::factory(),
            'comptescomptable_id' => \App\Models\Comptescomptable::factory(),
            'devises_monetaire_id' => \App\Models\DevisesMonetaire::factory(),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
