<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsModalite;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaiementsModaliteResource;
use App\Http\Resources\PaiementsModaliteCollection;
use App\Http\Requests\PaiementsModaliteStoreRequest;
use App\Http\Requests\PaiementsModaliteUpdateRequest;

class PaiementsModaliteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PaiementsModalite::class);

        $search = $request->get('search', '');

        $paiementsModalites = PaiementsModalite::search($search)
            ->latest()
            ->paginate();

        return new PaiementsModaliteCollection($paiementsModalites);
    }

    /**
     * @param \App\Http\Requests\PaiementsModaliteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaiementsModaliteStoreRequest $request)
    {
        $this->authorize('create', PaiementsModalite::class);

        $validated = $request->validated();

        $paiementsModalite = PaiementsModalite::create($validated);

        return new PaiementsModaliteResource($paiementsModalite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsModalite $paiementsModalite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaiementsModalite $paiementsModalite)
    {
        $this->authorize('view', $paiementsModalite);

        return new PaiementsModaliteResource($paiementsModalite);
    }

    /**
     * @param \App\Http\Requests\PaiementsModaliteUpdateRequest $request
     * @param \App\Models\PaiementsModalite $paiementsModalite
     * @return \Illuminate\Http\Response
     */
    public function update(
        PaiementsModaliteUpdateRequest $request,
        PaiementsModalite $paiementsModalite
    ) {
        $this->authorize('update', $paiementsModalite);

        $validated = $request->validated();

        $paiementsModalite->update($validated);

        return new PaiementsModaliteResource($paiementsModalite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsModalite $paiementsModalite
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        PaiementsModalite $paiementsModalite
    ) {
        $this->authorize('delete', $paiementsModalite);

        $paiementsModalite->delete();

        return response()->noContent();
    }
}
