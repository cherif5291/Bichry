<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\FactureResource;
use App\Http\Resources\FactureCollection;

class ClientsEntrepriseFacturesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('view', $clientsEntreprise);

        $search = $request->get('search', '');

        $factures = $clientsEntreprise
            ->factures()
            ->search($search)
            ->latest()
            ->paginate();

        return new FactureCollection($factures);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('create', Facture::class);

        $validated = $request->validate([
            'paiements_modalite_id' => 'required|exists:paiements_modalites,id',
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

        $facture = $clientsEntreprise->factures()->create($validated);

        return new FactureResource($facture);
    }
}
