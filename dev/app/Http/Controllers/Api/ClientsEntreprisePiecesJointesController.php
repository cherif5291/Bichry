<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\PiecesJointeResource;
use App\Http\Resources\PiecesJointeCollection;

class ClientsEntreprisePiecesJointesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('view', $clientsEntreprise);

        $search = $request->get('search', '');

        $piecesJointes = $clientsEntreprise
            ->piecesJointes()
            ->search($search)
            ->latest()
            ->paginate();

        return new PiecesJointeCollection($piecesJointes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('create', PiecesJointe::class);

        $validated = $request->validate([
            'fichier' => 'required|max:255|string',
        ]);

        $piecesJointe = $clientsEntreprise->piecesJointes()->create($validated);

        return new PiecesJointeResource($piecesJointe);
    }
}
