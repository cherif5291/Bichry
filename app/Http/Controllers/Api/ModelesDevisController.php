<?php

namespace App\Http\Controllers\Api;

use App\Models\ModelesDevis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelesDevisResource;
use App\Http\Resources\ModelesDevisCollection;
use App\Http\Requests\ModelesDevisStoreRequest;
use App\Http\Requests\ModelesDevisUpdateRequest;

class ModelesDevisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesDevis::class);

        $search = $request->get('search', '');

        $allModelesDevis = ModelesDevis::search($search)
            ->latest()
            ->paginate();

        return new ModelesDevisCollection($allModelesDevis);
    }

    /**
     * @param \App\Http\Requests\ModelesDevisStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesDevisStoreRequest $request)
    {
        $this->authorize('create', ModelesDevis::class);

        $validated = $request->validated();

        $modelesDevis = ModelesDevis::create($validated);

        return new ModelesDevisResource($modelesDevis);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('view', $modelesDevis);

        return new ModelesDevisResource($modelesDevis);
    }

    /**
     * @param \App\Http\Requests\ModelesDevisUpdateRequest $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesDevisUpdateRequest $request,
        ModelesDevis $modelesDevis
    ) {
        $this->authorize('update', $modelesDevis);

        $validated = $request->validated();

        $modelesDevis->update($validated);

        return new ModelesDevisResource($modelesDevis);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('delete', $modelesDevis);

        $modelesDevis->delete();

        return response()->noContent();
    }
}
