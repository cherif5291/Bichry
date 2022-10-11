<?php

namespace App\Http\Controllers\Api;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepensesPanierResource;
use App\Http\Resources\DepensesPanierCollection;

class DepenseDepensesPaniersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Depense $depense)
    {
        $this->authorize('view', $depense);

        $search = $request->get('search', '');

        $depensesPaniers = $depense
            ->depensesPaniers()
            ->search($search)
            ->latest()
            ->paginate();

        return new DepensesPanierCollection($depensesPaniers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Depense $depense)
    {
        $this->authorize('create', DepensesPanier::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
        ]);

        $depensesPanier = $depense->depensesPaniers()->create($validated);

        return new DepensesPanierResource($depensesPanier);
    }
}
