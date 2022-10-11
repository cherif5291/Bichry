<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DepensesPanier;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepensesPanierResource;
use App\Http\Resources\DepensesPanierCollection;
use App\Http\Requests\DepensesPanierStoreRequest;
use App\Http\Requests\DepensesPanierUpdateRequest;

class DepensesPanierController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DepensesPanier::class);

        $search = $request->get('search', '');

        $depensesPaniers = DepensesPanier::search($search)
            ->latest()
            ->paginate();

        return new DepensesPanierCollection($depensesPaniers);
    }

    /**
     * @param \App\Http\Requests\DepensesPanierStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepensesPanierStoreRequest $request)
    {
        $this->authorize('create', DepensesPanier::class);

        $validated = $request->validated();

        $depensesPanier = DepensesPanier::create($validated);

        return new DepensesPanierResource($depensesPanier);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DepensesPanier $depensesPanier)
    {
        $this->authorize('view', $depensesPanier);

        return new DepensesPanierResource($depensesPanier);
    }

    /**
     * @param \App\Http\Requests\DepensesPanierUpdateRequest $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function update(
        DepensesPanierUpdateRequest $request,
        DepensesPanier $depensesPanier
    ) {
        $this->authorize('update', $depensesPanier);

        $validated = $request->validated();

        $depensesPanier->update($validated);

        return new DepensesPanierResource($depensesPanier);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DepensesPanier $depensesPanier)
    {
        $this->authorize('delete', $depensesPanier);

        $depensesPanier->delete();

        return response()->noContent();
    }
}
