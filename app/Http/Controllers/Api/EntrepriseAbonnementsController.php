<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbonnementResource;
use App\Http\Resources\AbonnementCollection;

class EntrepriseAbonnementsController extends Controller
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

        $abonnements = $entreprise
            ->abonnements()
            ->search($search)
            ->latest()
            ->paginate();

        return new AbonnementCollection($abonnements);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Abonnement::class);

        $validated = $request->validate([
            'expiration' => 'required|date',
        ]);

        $abonnement = $entreprise->abonnements()->create($validated);

        return new AbonnementResource($abonnement);
    }
}
