<?php

namespace App\Http\Controllers;

use App\Models\PiecesJointe;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.pieces_jointes.index',
            compact('piecesJointes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PiecesJointe::class);

        return view('app.pieces_jointes.create');
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

        return redirect()
            ->route('pieces-jointes.edit', $piecesJointe)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PiecesJointe $piecesJointe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PiecesJointe $piecesJointe)
    {
        $this->authorize('view', $piecesJointe);

        return view('app.pieces_jointes.show', compact('piecesJointe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PiecesJointe $piecesJointe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PiecesJointe $piecesJointe)
    {
        $this->authorize('update', $piecesJointe);

        return view('app.pieces_jointes.edit', compact('piecesJointe'));
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

        return redirect()
            ->route('pieces-jointes.edit', $piecesJointe)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('pieces-jointes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
