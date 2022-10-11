<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motif' => $this->faker->text,
            'montant' => $this->faker->randomNumber(2),
            'pre_solde_banque' => $this->faker->randomNumber(2),
            'post_solde_banque' => $this->faker->randomNumber(2),
            'pre_solde_caisse' => $this->faker->randomNumber(2),
            'post_solde_caisse' => $this->faker->randomNumber(2),
            'type' => $this->faker->text(255),
            'banque_id' => \App\Models\Banque::factory(),
            'caisse_id' => \App\Models\Caisse::factory(),
        ];
    }
}
