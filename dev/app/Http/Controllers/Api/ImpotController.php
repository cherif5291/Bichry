<?php

namespace App\Http\Controllers\Api;

use App\Models\Impot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImpotResource;
use App\Http\Resources\ImpotCollection;
use App\Http\Requests\ImpotStoreRequest;
use App\Http\Requests\ImpotUpdateRequest;

class ImpotController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Impot::class);

        $search = $request->get('search', '');

        $impots = Impot::search($search)
            ->latest()
            ->paginate();

        return new ImpotCollection($impots);
    }

    /**
     * @param \App\Http\Requests\ImpotStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImpotStoreRequest $request)
    {
        $this->authorize('create', Impot::class);

        $validated = $request->validated();

        $impot = Impot::create($validated);

        return new ImpotResource($impot);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Impot $impot)
    {
        $this->authorize('view', $impot);

        return new ImpotResource($impot);
    }

    /**
     * @param \App\Http\Requests\ImpotUpdateRequest $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function update(ImpotUpdateRequest $request, Impot $impot)
    {
        $this->authorize('update', $impot);

        $validated = $request->validated();

        $impot->update($validated);

        return new ImpotResource($impot);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Impot $impot)
    {
        $this->authorize('delete', $impot);

        $impot->delete();

        return response()->noContent();
    }
}
