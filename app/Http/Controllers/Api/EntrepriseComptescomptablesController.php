<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComptescomptableResource;
use App\Http\Resources\ComptescomptableCollection;

class EntrepriseComptescomptablesController extends Controller
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

        $comptescomptables = $entreprise
            ->comptescomptables()
            ->search($search)
            ->latest()
            ->paginate();

        return new ComptescomptableCollection($comptescomptables);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Comptescomptable::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
            'numero_compte' => 'required|max:255|string',
        ]);

        $comptescomptable = $entreprise
            ->comptescomptables()
            ->create($validated);

        return new ComptescomptableResource($comptescomptable);
    }
}
