<?php

namespace App\Http\Controllers\Api;

use App\Models\RecusVente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecusVenteResource;
use App\Http\Resources\RecusVenteCollection;
use App\Http\Requests\RecusVenteStoreRequest;
use App\Http\Requests\RecusVenteUpdateRequest;

class RecusVenteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RecusVente::class);

        $search = $request->get('search', '');

        $recusVentes = RecusVente::search($search)
            ->latest()
            ->paginate();

        return new RecusVenteCollection($recusVentes);
    }

    /**
     * @param \App\Http\Requests\RecusVenteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecusVenteStoreRequest $request)
    {
        $this->authorize('create', RecusVente::class);

        $validated = $request->validated();

        $recusVente = RecusVente::create($validated);

        return new RecusVenteResource($recusVente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RecusVente $recusVente)
    {
        $this->authorize('view', $recusVente);

        return new RecusVenteResource($recusVente);
    }

    /**
     * @param \App\Http\Requests\RecusVenteUpdateRequest $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function update(
        RecusVenteUpdateRequest $request,
        RecusVente $recusVente
    ) {
        $this->authorize('update', $recusVente);

        $validated = $request->validated();

        $recusVente->update($validated);

        return new RecusVenteResource($recusVente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RecusVente $recusVente)
    {
        $this->authorize('delete', $recusVente);

        $recusVente->delete();

        return response()->noContent();
    }
}
