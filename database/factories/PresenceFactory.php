<?php

namespace Database\Factories;

use App\Models\Presence;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Presence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'heure_arrive' => $this->faker->time,
            'heure_depard' => $this->faker->time,
            'temps_absence' => $this->faker->randomNumber(0),
            'est_present' => $this->faker->text(255),
            'employes_entreprise_id' => \App\Models\EmployesEntreprise::factory(),
        ];
    }
}
