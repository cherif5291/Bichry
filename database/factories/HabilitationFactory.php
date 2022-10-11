<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Habilitation;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabilitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Habilitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'habilitation' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
            'module_id' => \App\Models\Module::factory(),
            'fonctionnalite_id' => \App\Models\Fonctionnalite::factory(),
        ];
    }
}
