<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;

class ClientsEntrepriseContratsController extends Controller
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

        $contrats = $clientsEntreprise
            ->contrats()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
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
        $this->authorize('create', Contrat::class);

        $validated = $request->validate([
            'status' => 'required|max:255|string',
            'signature1' => 'nullable|max:255|string',
            'signature2' => 'nullable|max:255|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'employes_entreprise_id' =>
                'required|exists:employes_entreprises,id',
            'facture_id' => 'required|exists:factures,id',
            'project_id' => 'required|exists:projects,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $contrat = $clientsEntreprise->contrats()->create($validated);

        return new ContratResource($contrat);
    }
}
