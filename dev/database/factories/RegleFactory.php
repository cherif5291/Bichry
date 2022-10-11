<?php

namespace Database\Factories;

use App\Models\Regle;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Regle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motif' => $this->faker->text(255),
            'montant' => $this->faker->randomNumber(2),
            'banque_id' => \App\Models\Banque::factory(),
        ];
    }
}
