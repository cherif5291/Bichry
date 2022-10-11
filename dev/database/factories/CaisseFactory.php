<?php

namespace Database\Factories;

use App\Models\Caisse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaisseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caisse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'solde' => $this->faker->randomNumber(2),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
