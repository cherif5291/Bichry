<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ContratsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratsModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContratsModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contrats_type_id' => \App\Models\ContratsType::factory(),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
