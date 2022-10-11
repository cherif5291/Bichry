<?php

namespace Database\Factories;

use App\Models\Paie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'montant_paye' => $this->faker->randomNumber(2),
            'restant' => $this->faker->randomNumber(2),
            'employes_entreprise_id' => \App\Models\EmployesEntreprise::factory(),
        ];
    }
}
