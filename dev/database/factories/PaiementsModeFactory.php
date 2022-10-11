<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PaiementsMode;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementsModeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaiementsMode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
        ];
    }
}
