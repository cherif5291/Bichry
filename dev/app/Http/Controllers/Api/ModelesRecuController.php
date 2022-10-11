<?php

namespace App\Http\Controllers\Api;

use App\Models\ModelesRecu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelesRecuResource;
use App\Http\Resources\ModelesRecuCollection;
use App\Http\Requests\ModelesRecuStoreRequest;
use App\Http\Requests\ModelesRecuUpdateRequest;

class ModelesRecuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesRecu::class);

        $search = $request->get('search', '');

        $modelesRecus = ModelesRecu::search($search)
            ->latest()
            ->paginate();

        return new ModelesRecuCollection($modelesRecus);
    }

    /**
     * @param \App\Http\Requests\ModelesRecuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesRecuStoreRequest $request)
    {
        $this->authorize('create', ModelesRecu::class);

        $validated = $request->validated();

        $modelesRecu = ModelesRecu::create($validated);

        return new ModelesRecuResource($modelesRecu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesRecu $modelesRecu)
    {
        $this->authorize('view', $modelesRecu);

        return new ModelesRecuResource($modelesRecu);
    }

    /**
     * @param \App\Http\Requests\ModelesRecuUpdateRequest $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesRecuUpdateRequest $request,
        ModelesRecu $modelesRecu
    ) {
        $this->authorize('update', $modelesRecu);

        $validated = $request->validated();

        $modelesRecu->update($validated);

        return new ModelesRecuResource($modelesRecu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesRecu $modelesRecu)
    {
        $this->authorize('delete', $modelesRecu);

        $modelesRecu->delete();

        return response()->noContent();
    }
}
