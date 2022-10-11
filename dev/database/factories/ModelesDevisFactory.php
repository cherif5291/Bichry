<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ModelesDevis;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelesDevisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelesDevis::class;

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
