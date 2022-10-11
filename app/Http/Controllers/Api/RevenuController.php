<?php

namespace App\Http\Controllers\Api;

use App\Models\Revenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RevenuResource;
use App\Http\Resources\RevenuCollection;
use App\Http\Requests\RevenuStoreRequest;
use App\Http\Requests\RevenuUpdateRequest;

class RevenuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Revenu::class);

        $search = $request->get('search', '');

        $revenus = Revenu::search($search)
            ->latest()
            ->paginate();

        return new RevenuCollection($revenus);
    }

    /**
     * @param \App\Http\Requests\RevenuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevenuStoreRequest $request)
    {
        $this->authorize('create', Revenu::class);

        $validated = $request->validated();

        $revenu = Revenu::create($validated);

        return new RevenuResource($revenu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Revenu $revenu)
    {
        $this->authorize('view', $revenu);

        return new RevenuResource($revenu);
    }

    /**
     * @param \App\Http\Requests\RevenuUpdateRequest $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function update(RevenuUpdateRequest $request, Revenu $revenu)
    {
        $this->authorize('update', $revenu);

        $validated = $request->validated();

        $revenu->update($validated);

        return new RevenuResource($revenu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Revenu $revenu)
    {
        $this->authorize('delete', $revenu);

        $revenu->delete();

        return response()->noContent();
    }
}
