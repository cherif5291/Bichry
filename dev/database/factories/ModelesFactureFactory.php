<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ModelesFacture;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelesFactureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelesFacture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'contenu' => $this->faker->text,
        ];
    }
}
