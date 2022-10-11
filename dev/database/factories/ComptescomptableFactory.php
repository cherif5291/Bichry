<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Comptescomptable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComptescomptableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comptescomptable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text(255),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
