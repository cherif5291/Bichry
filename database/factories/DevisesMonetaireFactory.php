<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DevisesMonetaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisesMonetaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DevisesMonetaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'sigle' => $this->faker->text(255),
            'taux_echange' => $this->faker->randomNumber(2),
        ];
    }
}
