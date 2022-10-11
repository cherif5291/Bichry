<?php

namespace App\Http\Controllers\Api;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FactureResource;
use App\Http\Resources\FactureCollection;

class FournisseurFacturesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Fournisseur $fournisseur)
    {
        $this->authorize('view', $fournisseur);

        $search = $request->get('search', '');

        $factures = $fournisseur
            ->factures()
            ->search($search)
            ->latest()
            ->paginate();

        return new FactureCollection($factures);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fournisseur $fournisseur)
    {
        $this->authorize('create', Facture::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'paiements_modalite_id' => 'required|exists:paiements_modalites,id',
            'factures_article_id' => 'required|exists:factures_articles,id',
            'cc_cci' => 'required|max:255|string',
            'echeance' => 'nullable|date',
            'adresse_facturation' => 'required|max:255|string',
            'numero_facture' => 'required|max:255',
            'messsage' => 'nullable|max:255|string',
            'message_affiche' => 'nullable|max:255|string',
            'has_taxe' => 'required|max:255|string',
            'type' => 'required|max:255|string',
        ]);

        $facture = $fournisseur->factures()->create($validated);

        return new FactureResource($facture);
    }
}
