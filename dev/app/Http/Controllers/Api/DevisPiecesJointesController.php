<?php

namespace App\Http\Controllers\Api;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class DevisPiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Devis $devis)
    {
        $this->authorize('view', $devis);

        $search = $request->get('search', '');

        $piecesJointes = $devis
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Devis $devis)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $devis->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
