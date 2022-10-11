<?php

namespace App\Http\Controllers\Api;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbonnementResource;
use App\Http\Resources\AbonnementCollection;
use App\Http\Requests\AbonnementStoreRequest;
use App\Http\Requests\AbonnementUpdateRequest;

class AbonnementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Abonnement::class);

        $search = $request->get('search', '');

        $abonnements = Abonnement::search($search)
            ->latest()
            ->paginate();

        return new AbonnementCollection($abonnements);
    }

    /**
     * @param \App\Http\Requests\AbonnementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbonnementStoreRequest $request)
    {
        $this->authorize('create', Abonnement::class);

        $validated = $request->validated();

        $abonnement = Abonnement::create($validated);

        return new AbonnementResource($abonnement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Abonnement $abonnement)
    {
        $this->authorize('view', $abonnement);

        return new AbonnementResource($abonnement);
    }

    /**
     * @param \App\Http\Requests\AbonnementUpdateRequest $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(
        AbonnementUpdateRequest $request,
        Abonnement $abonnement
    ) {
        $this->authorize('update', $abonnement);

        $validated = $request->validated();

        $abonnement->update($validated);

        return new AbonnementResource($abonnement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Abonnement $abonnement)
    {
        $this->authorize('delete', $abonnement);

        $abonnement->delete();

        return response()->noContent();
    }
}
