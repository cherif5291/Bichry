<?php

namespace App\Http\Controllers\Api;

use App\Models\Caisse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReglementResource;
use App\Http\Resources\ReglementCollection;

class CaisseReglementsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Caisse $caisse)
    {
        $this->authorize('view', $caisse);

        $search = $request->get('search', '');

        $reglements = $caisse
            ->reglements()
            ->search($search)
            ->latest()
            ->paginate();

        return new ReglementCollection($reglements);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Caisse $caisse)
    {
        $this->authorize('create', Reglement::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'facture_id' => 'nullable|exists:factures,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'nullable|max:255|string',
            'cc_cci' => 'nullable|max:255|string',
            'approvisionnememnt' => 'required|max:255|string',
            'banque_id' => 'nullable|exists:banques,id',
            'montant_recu' => 'required|numeric',
            'note' => 'nullable|max:255|string',
        ]);

        $reglement = $caisse->reglements()->create($validated);

        return new ReglementResource($reglement);
    }
}
