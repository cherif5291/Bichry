<?php

namespace App\Http\Controllers\Api;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;

class FournisseurContratsController extends Controller
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

        $contrats = $fournisseur
            ->contrats()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fournisseur $fournisseur)
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
            'facture_id' => 'required|exists:factures,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $contrat = $fournisseur->contrats()->create($validated);

        return new ContratResource($contrat);
    }
}
