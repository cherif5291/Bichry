<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaiementsModaliteResource;
use App\Http\Resources\PaiementsModaliteCollection;

class EntreprisePaiementsModalitesController extends Controller
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

        $paiementsModalites = $entreprise
            ->paiementsModalites()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaiementsModaliteCollection($paiementsModalites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', PaiementsModalite::class);

        $validated = $request->validate([]);

        $paiementsModalite = $entreprise
            ->paiementsModalites()
            ->create($validated);

        return new PaiementsModaliteResource($paiementsModalite);
    }
}
