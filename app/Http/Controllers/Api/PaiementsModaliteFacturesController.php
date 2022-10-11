<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsModalite;
use App\Http\Controllers\Controller;
use App\Http\Resources\FactureResource;
use App\Http\Resources\FactureCollection;

class PaiementsModaliteFacturesController extends Controller
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

        $factures = $paiementsModalite
            ->factures()
            ->search($search)
            ->latest()
            ->paginate();

        return new FactureCollection($factures);
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
        $this->authorize('create', Facture::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'factures_article_id' => 'required|exists:factures_articles,id',
            'cc_cci' => 'required|max:255|string',
            'echeance' => 'nullable|date',
            'adresse_facturation' => 'required|max:255|string',
            'numero_facture' => 'required|max:255',
            'messsage' => 'nullable|max:255|string',
            'message_affiche' => 'nullable|max:255|string',
            'has_taxe' => 'required|max:255|string',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'type' => 'required|max:255|string',
        ]);

        $facture = $paiementsModalite->factures()->create($validated);

        return new FactureResource($facture);
    }
}
