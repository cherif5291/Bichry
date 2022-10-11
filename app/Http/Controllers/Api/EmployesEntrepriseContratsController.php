<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;

class EmployesEntrepriseContratsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('view', $employesEntreprise);

        $search = $request->get('search', '');

        $contrats = $employesEntreprise
            ->contrats()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('create', Contrat::class);

        $validated = $request->validate([
            'status' => 'required|max:255|string',
            'signature1' => 'nullable|max:255|string',
            'signature2' => 'nullable|max:255|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'facture_id' => 'required|exists:factures,id',
            'project_id' => 'required|exists:projects,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $contrat = $employesEntreprise->contrats()->create($validated);

        return new ContratResource($contrat);
    }
}
