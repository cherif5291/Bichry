<?php

namespace App\Http\Controllers\Api;

use App\Models\PiecesJointe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;
use App\Http\Requests\PiecesJointeStoreRequest;
use App\Http\Requests\PiecesJointeUpdateRequest;

class PiecesJointeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PiecesJointe::class);

        $search = $request->get('search', '');

        $piecesJointes = PiecesJointe::search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \App\Http\Requests\PiecesJointeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PiecesJointeStoreRequest $request)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validated();

        $piecesJointe = PiecesJointe::create($validated);

        return new PiecesJointeResource($piecesJointe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PiecesJointe $piecesJointe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PiecesJointe $piecesJointe)
    {
        $this->authorize('view', $piecesJointe);

        return new PiecesJointeResource($piecesJointe);
    }

    /**
     * @param \App\Http\Requests\PiecesJointeUpdateRequest $request
     * @param \App\Models\PiecesJointe $piecesJointe
     * @return \Illuminate\Http\Response
     */
    public function update(
        PiecesJointeUpdateRequest $request,
        PiecesJointe $piecesJointe
    ) {
        $this->authorize('update', $piecesJointe);

        $validated = $request->validated();

        $piecesJointe->update($validated);

        return new PiecesJointeResource($piecesJointe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PiecesJointe $piecesJointe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PiecesJointe $piecesJointe)
    {
        $this->authorize('delete', $piecesJointe);

        $piecesJointe->delete();

        return response()->noContent();
    }
}
