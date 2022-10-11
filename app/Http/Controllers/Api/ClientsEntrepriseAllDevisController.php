<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisResource;
use App\Http\Resources\DevisCollection;

class ClientsEntrepriseAllDevisController extends Controller
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

        $allDevis = $clientsEntreprise
            ->allDevis()
            ->search($search)
            ->latest()
            ->paginate();

        return new DevisCollection($allDevis);
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
        $this->authorize('create', Devis::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_facturation' => 'required|max:255|string',
            'expiration' => 'required|date',
            'numero_devis' => 'required|max:255',
            'message_devis' => 'nullable|max:255|string',
            'message_releve' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
        ]);

        $devis = $clientsEntreprise->allDevis()->create($validated);

        return new DevisResource($devis);
    }
}
