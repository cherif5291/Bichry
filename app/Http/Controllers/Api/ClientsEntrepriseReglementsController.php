<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReglementResource;
use App\Http\Resources\ReglementCollection;

class ClientsEntrepriseReglementsController extends Controller
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

        $reglements = $clientsEntreprise
            ->reglements()
            ->search($search)
            ->latest()
            ->paginate();

        return new ReglementCollection($reglements);
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
        $this->authorize('create', Reglement::class);

        $validated = $request->validate([
            'facture_id' => 'nullable|exists:factures,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'nullable|max:255|string',
            'cc_cci' => 'nullable|max:255|string',
            'approvisionnememnt' => 'required|max:255|string',
            'banque_id' => 'nullable|exists:banques,id',
            'caisse_id' => 'nullable|exists:caisses,id',
            'montant_recu' => 'required|numeric',
            'note' => 'nullable|max:255|string',
        ]);

        $reglement = $clientsEntreprise->reglements()->create($validated);

        return new ReglementResource($reglement);
    }
}
