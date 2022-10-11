<?php

namespace App\Http\Controllers\Api;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisResource;
use App\Http\Resources\DevisCollection;
use App\Http\Requests\DevisStoreRequest;
use App\Http\Requests\DevisUpdateRequest;

class DevisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Devis::class);

        $search = $request->get('search', '');

        $allDevis = Devis::search($search)
            ->latest()
            ->paginate();

        return new DevisCollection($allDevis);
    }

    /**
     * @param \App\Http\Requests\DevisStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisStoreRequest $request)
    {
        $this->authorize('create', Devis::class);

        $validated = $request->validated();

        $devis = Devis::create($validated);

        return new DevisResource($devis);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Devis $devis)
    {
        $this->authorize('view', $devis);

        return new DevisResource($devis);
    }

    /**
     * @param \App\Http\Requests\DevisUpdateRequest $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function update(DevisUpdateRequest $request, Devis $devis)
    {
        $this->authorize('update', $devis);

        $validated = $request->validated();

        $devis->update($validated);

        return new DevisResource($devis);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Devis $devis)
    {
        $this->authorize('delete', $devis);

        $devis->delete();

        return response()->noContent();
    }
}
