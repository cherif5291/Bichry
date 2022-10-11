<?php

namespace Database\Factories;

use App\Models\InfosSystem;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfosSystemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfosSystem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_plateforme' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'website' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'portable' => $this->faker->text(255),
            'email_contact' => $this->faker->email,
            'email_support' => $this->faker->text(255),
        ];
    }
}
