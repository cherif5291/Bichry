<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepenseResource;
use App\Http\Resources\DepenseCollection;

class EntrepriseDepensesController extends Controller
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

        $depenses = $entreprise
            ->depenses()
            ->search($search)
            ->latest()
            ->paginate();

        return new DepenseCollection($depenses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Depense::class);

        $validated = $request->validate([
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'required|max:255',
            'note' => 'required|max:255|string',
            'source' => 'required|max:255|string',
        ]);

        $depense = $entreprise->depenses()->create($validated);

        return new DepenseResource($depense);
    }
}
