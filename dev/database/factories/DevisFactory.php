<?php

namespace Database\Factories;

use App\Models\Devis;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cc_cci' => $this->faker->text,
            'adresse_facturation' => $this->faker->text,
            'expiration' => $this->faker->date,
            'numero_devis' => $this->faker->randomNumber,
            'message_devis' => $this->faker->text,
            'message_releve' => $this->faker->text,
            'status' => $this->faker->word,
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
        ];
    }
}
