<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaisseResource;
use App\Http\Resources\CaisseCollection;

class EntrepriseCaissesController extends Controller
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

        $caisses = $entreprise
            ->caisses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaisseCollection($caisses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Caisse::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
            'solde' => 'required|numeric',
        ]);

        $caisse = $entreprise->caisses()->create($validated);

        return new CaisseResource($caisse);
    }
}
