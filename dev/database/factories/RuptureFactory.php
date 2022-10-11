<?php

namespace Database\Factories;

use App\Models\Rupture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuptureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rupture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->word,
            'invitation_id' => \App\Models\Invitation::factory(),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
