<?php

namespace App\Http\Controllers\Api;

use App\Models\ContratsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratsTypeResource;
use App\Http\Resources\ContratsTypeCollection;
use App\Http\Requests\ContratsTypeStoreRequest;
use App\Http\Requests\ContratsTypeUpdateRequest;

class ContratsTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ContratsType::class);

        $search = $request->get('search', '');

        $contratsTypes = ContratsType::search($search)
            ->latest()
            ->paginate();

        return new ContratsTypeCollection($contratsTypes);
    }

    /**
     * @param \App\Http\Requests\ContratsTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratsTypeStoreRequest $request)
    {
        $this->authorize('create', ContratsType::class);

        $validated = $request->validated();

        $contratsType = ContratsType::create($validated);

        return new ContratsTypeResource($contratsType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsType $contratsType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ContratsType $contratsType)
    {
        $this->authorize('view', $contratsType);

        return new ContratsTypeResource($contratsType);
    }

    /**
     * @param \App\Http\Requests\ContratsTypeUpdateRequest $request
     * @param \App\Models\ContratsType $contratsType
     * @return \Illuminate\Http\Response
     */
    public function update(
        ContratsTypeUpdateRequest $request,
        ContratsType $contratsType
    ) {
        $this->authorize('update', $contratsType);

        $validated = $request->validated();

        $contratsType->update($validated);

        return new ContratsTypeResource($contratsType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsType $contratsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ContratsType $contratsType)
    {
        $this->authorize('delete', $contratsType);

        $contratsType->delete();

        return response()->noContent();
    }
}
