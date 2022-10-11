<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Fonctionnalite;
use Illuminate\Database\Eloquent\Factories\Factory;

class FonctionnaliteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fonctionnalite::class;

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
            'voir' => $this->faker->text(255),
            'ajouter' => $this->faker->text(255),
            'supprimer' => $this->faker->text(255),
            'modifier' => $this->faker->text(255),
            'exporter' => $this->faker->text(255),
            'module_id' => \App\Models\Module::factory(),
        ];
    }
}
