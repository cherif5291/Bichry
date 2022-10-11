<?php

namespace App\Http\Controllers\Api;

use App\Models\Reglement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReglementResource;
use App\Http\Resources\ReglementCollection;
use App\Http\Requests\ReglementStoreRequest;
use App\Http\Requests\ReglementUpdateRequest;

class ReglementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Reglement::class);

        $search = $request->get('search', '');

        $reglements = Reglement::search($search)
            ->latest()
            ->paginate();

        return new ReglementCollection($reglements);
    }

    /**
     * @param \App\Http\Requests\ReglementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReglementStoreRequest $request)
    {
        $this->authorize('create', Reglement::class);

        $validated = $request->validated();

        $reglement = Reglement::create($validated);

        return new ReglementResource($reglement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reglement $reglement)
    {
        $this->authorize('view', $reglement);

        return new ReglementResource($reglement);
    }

    /**
     * @param \App\Http\Requests\ReglementUpdateRequest $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReglementUpdateRequest $request,
        Reglement $reglement
    ) {
        $this->authorize('update', $reglement);

        $validated = $request->validated();

        $reglement->update($validated);

        return new ReglementResource($reglement);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reglement $reglement)
    {
        $this->authorize('delete', $reglement);

        $reglement->delete();

        return response()->noContent();
    }
}
