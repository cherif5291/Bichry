<?php

namespace App\Http\Controllers\Api;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepenseResource;
use App\Http\Resources\DepenseCollection;
use App\Http\Requests\DepenseStoreRequest;
use App\Http\Requests\DepenseUpdateRequest;

class DepenseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Depense::class);

        $search = $request->get('search', '');

        $depenses = Depense::search($search)
            ->latest()
            ->paginate();

        return new DepenseCollection($depenses);
    }

    /**
     * @param \App\Http\Requests\DepenseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepenseStoreRequest $request)
    {
        $this->authorize('create', Depense::class);

        $validated = $request->validated();

        $depense = Depense::create($validated);

        return new DepenseResource($depense);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Depense $depense)
    {
        $this->authorize('view', $depense);

        return new DepenseResource($depense);
    }

    /**
     * @param \App\Http\Requests\DepenseUpdateRequest $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function update(DepenseUpdateRequest $request, Depense $depense)
    {
        $this->authorize('update', $depense);

        $validated = $request->validated();

        $depense->update($validated);

        return new DepenseResource($depense);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Depense $depense)
    {
        $this->authorize('delete', $depense);

        $depense->delete();

        return response()->noContent();
    }
}
