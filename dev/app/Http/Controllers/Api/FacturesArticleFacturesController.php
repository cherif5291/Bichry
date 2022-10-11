<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\FacturesArticle;
use App\Http\Controllers\Controller;
use App\Http\Resources\FactureResource;
use App\Http\Resources\FactureCollection;

class FacturesArticleFacturesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('view', $facturesArticle);

        $search = $request->get('search', '');

        $factures = $facturesArticle
            ->factures()
            ->search($search)
            ->latest()
            ->paginate();

        return new FactureCollection($factures);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('create', Facture::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'paiements_modalite_id' => 'required|exists:paiements_modalites,id',
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

        $facture = $facturesArticle->factures()->create($validated);

        return new FactureResource($facture);
    }
}
