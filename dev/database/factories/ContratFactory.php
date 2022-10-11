<?php

namespace Database\Factories;

use App\Models\Contrat;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contrat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->word,
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'clients_entreprise_id' => \App\Models\ClientsEntreprise::factory(),
            'employes_entreprise_id' => \App\Models\EmployesEntreprise::factory(),
            'facture_id' => \App\Models\Facture::factory(),
            'project_id' => \App\Models\Project::factory(),
            'fournisseur_id' => \App\Models\Fournisseur::factory(),
        ];
    }
}
