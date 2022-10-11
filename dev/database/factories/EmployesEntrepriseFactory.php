<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EmployesEntreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployesEntrepriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployesEntreprise::class;

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
            'initial' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'data_embauche' => $this->faker->date,
            'interval_paiement' => $this->faker->text(255),
            'duree_interval' => $this->faker->randomNumber(0),
            'remuneration' => $this->faker->randomNumber(2),
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
