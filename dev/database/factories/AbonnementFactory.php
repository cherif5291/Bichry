<?php

namespace Database\Factories;

use App\Models\Abonnement;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonnementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abonnement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expiration' => $this->faker->date,
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
