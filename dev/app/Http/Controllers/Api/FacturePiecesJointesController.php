<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class FacturePiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Facture $facture)
    {
        $this->authorize('view', $facture);

        $search = $request->get('search', '');

        $piecesJointes = $facture
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Facture $facture)
    {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $facture->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
