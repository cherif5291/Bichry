<?php

namespace Database\Factories;

use App\Models\Bonus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BonusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bonus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
            'duree' => $this->faker->date,
            'abonnement_id' => \App\Models\Abonnement::factory(),
        ];
    }
}
