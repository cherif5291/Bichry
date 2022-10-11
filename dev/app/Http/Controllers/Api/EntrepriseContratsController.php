<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;

class EntrepriseContratsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $contrats = $entreprise
            ->contrats()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Contrat::class);

        $validated = $request->validate([
            'status' => 'required|max:255|string',
            'signature1' => 'nullable|max:255|string',
            'signature2' => 'nullable|max:255|string',
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'employes_entreprise_id' =>
                'required|exists:employes_entreprises,id',
            'facture_id' => 'required|exists:factures,id',
            'project_id' => 'required|exists:projects,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $contrat = $entreprise->contrats()->create($validated);

        return new ContratResource($contrat);
    }
}
