<?php

namespace App\Http\Controllers\Api;

use App\Models\Rupture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RuptureResource;
use App\Http\Resources\RuptureCollection;
use App\Http\Requests\RuptureStoreRequest;
use App\Http\Requests\RuptureUpdateRequest;

class RuptureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Rupture::class);

        $search = $request->get('search', '');

        $ruptures = Rupture::search($search)
            ->latest()
            ->paginate();

        return new RuptureCollection($ruptures);
    }

    /**
     * @param \App\Http\Requests\RuptureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuptureStoreRequest $request)
    {
        $this->authorize('create', Rupture::class);

        $validated = $request->validated();

        $rupture = Rupture::create($validated);

        return new RuptureResource($rupture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rupture $rupture)
    {
        $this->authorize('view', $rupture);

        return new RuptureResource($rupture);
    }

    /**
     * @param \App\Http\Requests\RuptureUpdateRequest $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function update(RuptureUpdateRequest $request, Rupture $rupture)
    {
        $this->authorize('update', $rupture);

        $validated = $request->validated();

        $rupture->update($validated);

        return new RuptureResource($rupture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rupture $rupture)
    {
        $this->authorize('delete', $rupture);

        $rupture->delete();

        return response()->noContent();
    }
}
