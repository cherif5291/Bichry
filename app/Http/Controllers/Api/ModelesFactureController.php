<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ModelesFacture;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelesFactureResource;
use App\Http\Resources\ModelesFactureCollection;
use App\Http\Requests\ModelesFactureStoreRequest;
use App\Http\Requests\ModelesFactureUpdateRequest;

class ModelesFactureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesFacture::class);

        $search = $request->get('search', '');

        $modelesFactures = ModelesFacture::search($search)
            ->latest()
            ->paginate();

        return new ModelesFactureCollection($modelesFactures);
    }

    /**
     * @param \App\Http\Requests\ModelesFactureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesFactureStoreRequest $request)
    {
        $this->authorize('create', ModelesFacture::class);

        $validated = $request->validated();

        $modelesFacture = ModelesFacture::create($validated);

        return new ModelesFactureResource($modelesFacture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesFacture $modelesFacture)
    {
        $this->authorize('view', $modelesFacture);

        return new ModelesFactureResource($modelesFacture);
    }

    /**
     * @param \App\Http\Requests\ModelesFactureUpdateRequest $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesFactureUpdateRequest $request,
        ModelesFacture $modelesFacture
    ) {
        $this->authorize('update', $modelesFacture);

        $validated = $request->validated();

        $modelesFacture->update($validated);

        return new ModelesFactureResource($modelesFacture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesFacture $modelesFacture)
    {
        $this->authorize('delete', $modelesFacture);

        $modelesFacture->delete();

        return response()->noContent();
    }
}
