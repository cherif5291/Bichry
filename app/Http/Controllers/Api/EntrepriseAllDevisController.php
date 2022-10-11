<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisResource;
use App\Http\Resources\DevisCollection;

class EntrepriseAllDevisController extends Controller
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

        $allDevis = $entreprise
            ->allDevis()
            ->search($search)
            ->latest()
            ->paginate();

        return new DevisCollection($allDevis);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Devis::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'nullable|exists:clients_entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_facturation' => 'required|max:255|string',
            'expiration' => 'required|date',
            'numero_devis' => 'required|max:255',
            'message_devis' => 'nullable|max:255|string',
            'message_releve' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
        ]);

        $devis = $entreprise->allDevis()->create($validated);

        return new DevisResource($devis);
    }
}
