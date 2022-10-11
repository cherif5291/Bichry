<?php

namespace App\Http\Controllers\Api;

use App\Models\Reglement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class ReglementPiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Reglement $reglement)
    {
        $this->authorize('view', $reglement);

        $search = $request->get('search', '');

        $piecesJointes = $reglement
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reglement $reglement)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $reglement->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
