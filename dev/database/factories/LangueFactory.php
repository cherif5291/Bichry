<?php

namespace Database\Factories;

use App\Models\Langue;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LangueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Langue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'traduction' => $this->faker->text,
        ];
    }
}
