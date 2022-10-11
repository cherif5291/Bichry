<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReglementResource;
use App\Http\Resources\ReglementCollection;

class PaiementsModeReglementsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('view', $paiementsMode);

        $search = $request->get('search', '');

        $reglements = $paiementsMode
            ->reglements()
            ->search($search)
            ->latest()
            ->paginate();

        return new ReglementCollection($reglements);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('create', Reglement::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'facture_id' => 'nullable|exists:factures,id',
            'reference' => 'nullable|max:255|string',
            'cc_cci' => 'nullable|max:255|string',
            'approvisionnememnt' => 'required|max:255|string',
            'banque_id' => 'nullable|exists:banques,id',
            'caisse_id' => 'nullable|exists:caisses,id',
            'montant_recu' => 'required|numeric',
            'note' => 'nullable|max:255|string',
        ]);

        $reglement = $paiementsMode->reglements()->create($validated);

        return new ReglementResource($reglement);
    }
}
