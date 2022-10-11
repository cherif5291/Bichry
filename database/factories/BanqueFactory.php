<?php

namespace Database\Factories;

use App\Models\Banque;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BanqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banque::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'numero_compte' => $this->faker->text,
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
