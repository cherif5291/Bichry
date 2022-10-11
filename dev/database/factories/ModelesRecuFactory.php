<?php

namespace Database\Factories;

use App\Models\ModelesRecu;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelesRecuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelesRecu::class;

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
