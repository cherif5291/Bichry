<?php

namespace Database\Factories;

use App\Models\Depense;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Depense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->randomNumber,
            'note' => $this->faker->text,
            'source' => $this->faker->text(255),
            'client_id' => \App\Models\Entreprise::factory(),
            'paiements_mode_id' => \App\Models\PaiementsMode::factory(),
        ];
    }
}
