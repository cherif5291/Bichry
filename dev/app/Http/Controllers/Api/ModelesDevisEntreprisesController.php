<?php

namespace App\Http\Controllers\Api;

use App\Models\ModelesDevis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EntrepriseResource;
use App\Http\Resources\EntrepriseCollection;

class ModelesDevisEntreprisesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('view', $modelesDevis);

        $search = $request->get('search', '');

        $entreprises = $modelesDevis
            ->entreprises()
            ->search($search)
            ->latest()
            ->paginate();

        return new EntrepriseCollection($entreprises);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('create', Entreprise::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nom_entreprise' => 'required|max:255|string',
            'a_propos' => 'required|max:255|string',
            'email' => 'required|email',
            'telephone' => 'required|max:255|string',
            'portable' => 'required|max:255|string',
            'adresse' => 'required|max:255|string',
            'capital' => 'nullable|numeric',
            'logo' => 'nullable|max:255|string',
            'modeles_facture_id' => 'required|exists:modeles_factures,id',
            'modeles_recu_id' => 'required|exists:modeles_recus,id',
            'devises_monetaire_id' => 'required|exists:devises_monetaires,id',
            'couleur_primaire' => 'nullable|max:255|string',
            'couleur_secondaire' => 'nullable|max:255|string',
        ]);

        $entreprise = $modelesDevis->entreprises()->create($validated);

        return new EntrepriseResource($entreprise);
    }
}
