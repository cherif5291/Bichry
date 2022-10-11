<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PiecesJointe;
use Illuminate\Database\Eloquent\Factories\Factory;

class PiecesJointeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PiecesJointe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fichier' => $this->faker->text,
            'recus_vente_id' => \App\Models\RecusVente::factory(),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'devis_id' => \App\Models\Devis::factory(),
            'facture_id' => \App\Models\Facture::factory(),
            'reglement_id' => \App\Models\Reglement::factory(),
            'depense_id' => \App\Models\Depense::factory(),
            'revenu_id' => \App\Models\Revenu::factory(),
            'entreprise_id' => \App\Models\Entreprise::factory(),
        ];
    }
}
