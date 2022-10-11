<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Comptescomptable;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComptescomptableResource;
use App\Http\Resources\ComptescomptableCollection;
use App\Http\Requests\ComptescomptableStoreRequest;
use App\Http\Requests\ComptescomptableUpdateRequest;

class ComptescomptableController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Comptescomptable::class);

        $search = $request->get('search', '');

        $comptescomptables = Comptescomptable::search($search)
            ->latest()
            ->paginate();

        return new ComptescomptableCollection($comptescomptables);
    }

    /**
     * @param \App\Http\Requests\ComptescomptableStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComptescomptableStoreRequest $request)
    {
        $this->authorize('create', Comptescomptable::class);

        $validated = $request->validated();

        $comptescomptable = Comptescomptable::create($validated);

        return new ComptescomptableResource($comptescomptable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comptescomptable $comptescomptable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Comptescomptable $comptescomptable)
    {
        $this->authorize('view', $comptescomptable);

        return new ComptescomptableResource($comptescomptable);
    }

    /**
     * @param \App\Http\Requests\ComptescomptableUpdateRequest $request
     * @param \App\Models\Comptescomptable $comptescomptable
     * @return \Illuminate\Http\Response
     */
    public function update(
        ComptescomptableUpdateRequest $request,
        Comptescomptable $comptescomptable
    ) {
        $this->authorize('update', $comptescomptable);

        $validated = $request->validated();

        $comptescomptable->update($validated);

        return new ComptescomptableResource($comptescomptable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comptescomptable $comptescomptable
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Comptescomptable $comptescomptable
    ) {
        $this->authorize('delete', $comptescomptable);

        $comptescomptable->delete();

        return response()->noContent();
    }
}
