<?php

namespace Database\Factories;

use App\Models\Recurrence;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecurrenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recurrence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'interval_jour' => $this->faker->randomNumber(0),
            'prochain_date' => $this->faker->date,
            'facture_id' => \App\Models\Facture::factory(),
            'paie_id' => \App\Models\Paie::factory(),
            'regle_id' => \App\Models\Regle::factory(),
        ];
    }
}
