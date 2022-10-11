<?php

namespace Database\Factories;

use App\Models\RecusVente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecusVenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecusVente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cc_cci' => $this->faker->text,
            'adresse_livraison' => $this->faker->text,
            'date_recu_vente' => $this->faker->date,
            'reference' => $this->faker->randomNumber,
            'numero_recu' => $this->faker->randomNumber,
            'message_recu' => $this->faker->text,
            'message_releve' => $this->faker->text,
            'depose_sur' => $this->faker->text(255),
            'montant' => $this->faker->randomNumber(2),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'article_id' => \App\Models\Article::factory(),
            'paiements_mode_id' => \App\Models\PaiementsMode::factory(),
            'caisse_id' => \App\Models\Caisse::factory(),
            'banque_id' => \App\Models\Banque::factory(),
        ];
    }
}
