<?php

namespace App\Http\Controllers\Api;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class DepensePiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Depense $depense)
    {
        $this->authorize('view', $depense);

        $search = $request->get('search', '');

        $piecesJointes = $depense
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Depense $depense)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $depense->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
