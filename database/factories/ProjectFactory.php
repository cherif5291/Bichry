<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'cout' => $this->faker->randomNumber(2),
            'dead_line' => $this->faker->date,
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
        ];
    }
}
