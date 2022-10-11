<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReglementResource;
use App\Http\Resources\ReglementCollection;

class FactureReglementsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Facture $facture)
    {
        $this->authorize('view', $facture);

        $search = $request->get('search', '');

        $reglements = $facture
            ->reglements()
            ->search($search)
            ->latest()
            ->paginate();

        return new ReglementCollection($reglements);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Facture $facture)
    {
        $this->authorize('create', Reglement::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'nullable|max:255|string',
            'cc_cci' => 'nullable|max:255|string',
            'approvisionnememnt' => 'required|max:255|string',
            'banque_id' => 'nullable|exists:banques,id',
            'caisse_id' => 'nullable|exists:caisses,id',
            'montant_recu' => 'required|numeric',
            'note' => 'nullable|max:255|string',
        ]);

        $reglement = $facture->reglements()->create($validated);

        return new ReglementResource($reglement);
    }
}
