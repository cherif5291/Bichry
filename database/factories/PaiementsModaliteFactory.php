<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PaiementsModalite;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementsModaliteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaiementsModalite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
