<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsModalite;
use App\Http\Controllers\Controller;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\FournisseurCollection;

class PaiementsModaliteFournisseursController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsModalite $paiementsModalite
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        PaiementsModalite $paiementsModalite
    ) {
        $this->authorize('view', $paiementsModalite);

        $search = $request->get('search', '');

        $fournisseurs = $paiementsModalite
            ->fournisseursDepenses()
            ->search($search)
            ->latest()
            ->paginate();

        return new FournisseurCollection($fournisseurs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsModalite $paiementsModalite
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        PaiementsModalite $paiementsModalite
    ) {
        $this->authorize('create', Fournisseur::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
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
            'numero_compte' => 'nullable|max:255|string',
            'comptescomptable_id' => 'nullable|exists:comptescomptables,id',
            'solde_ouverture' => 'nullable|numeric',
            'date_ouverture' => 'nullable|date',
            'devises_monetaire_id' => 'required|exists:devises_monetaires,id',
        ]);

        $fournisseur = $paiementsModalite
            ->fournisseursDepenses()
            ->create($validated);

        return new FournisseurResource($fournisseur);
    }
}
