<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepensesPanierResource;
use App\Http\Resources\DepensesPanierCollection;

class ClientsEntrepriseDepensesPaniersController extends Controller
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

        $depensesPaniers = $clientsEntreprise
            ->depensesPaniers()
            ->search($search)
            ->latest()
            ->paginate();

        return new DepensesPanierCollection($depensesPaniers);
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
        $this->authorize('create', DepensesPanier::class);

        $validated = $request->validate([
            'depense_id' => 'required|exists:depenses,id',
        ]);

        $depensesPanier = $clientsEntreprise
            ->depensesPaniers()
            ->create($validated);

        return new DepensesPanierResource($depensesPanier);
    }
}
