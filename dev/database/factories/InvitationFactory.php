<?php

namespace Database\Factories;

use App\Models\Invitation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invitant_id' => $this->faker->randomNumber(0),
            'invite_id' => $this->faker->randomNumber(0),
        ];
    }
}
