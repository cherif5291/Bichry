<?php

namespace App\Http\Controllers\Api;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratResource;
use App\Http\Resources\ContratCollection;
use App\Http\Requests\ContratStoreRequest;
use App\Http\Requests\ContratUpdateRequest;

class ContratController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Contrat::class);

        $search = $request->get('search', '');

        $contrats = Contrat::search($search)
            ->latest()
            ->paginate();

        return new ContratCollection($contrats);
    }

    /**
     * @param \App\Http\Requests\ContratStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratStoreRequest $request)
    {
        $this->authorize('create', Contrat::class);

        $validated = $request->validated();

        $contrat = Contrat::create($validated);

        return new ContratResource($contrat);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contrat $contrat)
    {
        $this->authorize('view', $contrat);

        return new ContratResource($contrat);
    }

    /**
     * @param \App\Http\Requests\ContratUpdateRequest $request
     * @param \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(ContratUpdateRequest $request, Contrat $contrat)
    {
        $this->authorize('update', $contrat);

        $validated = $request->validated();

        $contrat->update($validated);

        return new ContratResource($contrat);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contrat $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contrat $contrat)
    {
        $this->authorize('delete', $contrat);

        $contrat->delete();

        return response()->noContent();
    }
}
