<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\FournisseurCollection;

class EntrepriseFournisseursController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $fournisseurs = $entreprise
            ->fournisseurs()
            ->search($search)
            ->latest()
            ->paginate();

        return new FournisseurCollection($fournisseurs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Fournisseur::class);

        $validated = $request->validate([
            'prenom' => 'required|max:255|string',
            'nom' => 'required|max:255|string',
            'entreprise' => 'required|max:255|string',
            'email' => 'required|email',
            'telephone' => 'required|max:255|string',

            'titre' => 'nullable|max:255|string',
            'adresse' => 'required|max:255|string',
            'ville' => 'required|max:255|string',
            'province' => 'nullable|max:255|string',
            'code_postal' => 'nullable|max:255|string',
            'pays' => 'required|max:255|string',
            'note' => 'nullable|max:255|string',
            'paiements_modalite_id' => 'nullable|exists:paiements_modalites,id',
            'numero_compte' => 'nullable|max:255|string',
            'comptescomptable_id' => 'nullable|exists:comptescomptables,id',
            'solde_ouverture' => 'nullable|numeric',
            'date_ouverture' => 'nullable|date',
            'devises_monetaire_id' => 'required|exists:devises_monetaires,id',
        ]);

        $fournisseur = $entreprise->fournisseurs()->create($validated);

        return new FournisseurResource($fournisseur);
    }
}
