<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ContratsType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratsTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContratsType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
