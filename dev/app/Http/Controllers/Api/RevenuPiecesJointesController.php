<?php

namespace App\Http\Controllers\Api;

use App\Models\Revenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class RevenuPiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Revenu $revenu)
    {
        $this->authorize('view', $revenu);

        $search = $request->get('search', '');

        $piecesJointes = $revenu
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Revenu $revenu)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $revenu->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
