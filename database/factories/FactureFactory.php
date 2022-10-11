<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cc_cci' => $this->faker->text,
            'echeance' => $this->faker->date,
            'adresse_facturation' => $this->faker->text,
            'numero_facture' => $this->faker->randomNumber,
            'messsage' => $this->faker->text,
            'message_affiche' => $this->faker->text,
            'has_taxe' => $this->faker->text(255),
            'type' => $this->faker->text(255),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'paiements_modalite_id' => \App\Models\PaiementsModalite::factory(),
            'factures_article_id' => \App\Models\FacturesArticle::factory(),
            'fournisseur_id' => \App\Models\Fournisseur::factory(),
        ];
    }
}
