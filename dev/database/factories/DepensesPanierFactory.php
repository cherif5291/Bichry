<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DepensesPanier;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepensesPanierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepensesPanier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'depense_id' => \App\Models\Depense::factory(),
        ];
    }
}
