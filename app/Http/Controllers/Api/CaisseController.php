<?php

namespace App\Http\Controllers\Api;

use App\Models\Caisse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaisseResource;
use App\Http\Resources\CaisseCollection;
use App\Http\Requests\CaisseStoreRequest;
use App\Http\Requests\CaisseUpdateRequest;

class CaisseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Caisse::class);

        $search = $request->get('search', '');

        $caisses = Caisse::search($search)
            ->latest()
            ->paginate();

        return new CaisseCollection($caisses);
    }

    /**
     * @param \App\Http\Requests\CaisseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaisseStoreRequest $request)
    {
        $this->authorize('create', Caisse::class);

        $validated = $request->validated();

        $caisse = Caisse::create($validated);

        return new CaisseResource($caisse);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Caisse $caisse)
    {
        $this->authorize('view', $caisse);

        return new CaisseResource($caisse);
    }

    /**
     * @param \App\Http\Requests\CaisseUpdateRequest $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(CaisseUpdateRequest $request, Caisse $caisse)
    {
        $this->authorize('update', $caisse);

        $validated = $request->validated();

        $caisse->update($validated);

        return new CaisseResource($caisse);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Caisse $caisse)
    {
        $this->authorize('delete', $caisse);

        $caisse->delete();

        return response()->noContent();
    }
}
