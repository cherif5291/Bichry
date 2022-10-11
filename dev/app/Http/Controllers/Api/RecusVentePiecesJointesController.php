<?php

namespace App\Http\Controllers\Api;

use App\Models\RecusVente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class RecusVentePiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RecusVente $recusVente)
    {
        $this->authorize('view', $recusVente);

        $search = $request->get('search', '');

        $piecesJointes = $recusVente
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RecusVente $recusVente)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $recusVente->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
