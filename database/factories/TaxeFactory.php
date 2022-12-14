<?php

namespace Database\Factories;

use App\Models\Taxe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taxe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'taux' => $this->faker->randomNumber(2),
        ];
    }
}
