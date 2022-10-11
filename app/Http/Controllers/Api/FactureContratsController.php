<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;

class FactureContratsController extends Controller
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

        $contrats = $facture
            ->contrats()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Facture $facture)
    {
        $this->authorize('create', Contrat::class);

        $validated = $request->validate([
            'status' => 'required|max:255|string',
            'signature1' => 'nullable|max:255|string',
            'signature2' => 'nullable|max:255|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'employes_entreprise_id' =>
                'required|exists:employes_entreprises,id',
            'project_id' => 'required|exists:projects,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $contrat = $facture->contrats()->create($validated);

        return new ContratResource($contrat);
    }
}
