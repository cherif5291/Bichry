<?php

namespace App\Http\Controllers\Api;

use App\Models\Banque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegleResource;
use App\Http\Resources\RegleCollection;

class BanqueReglesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Banque $banque)
    {
        $this->authorize('view', $banque);

        $search = $request->get('search', '');

        $regles = $banque
            ->regles()
            ->search($search)
            ->latest()
            ->paginate();

        return new RegleCollection($regles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Banque $banque)
    {
        $this->authorize('create', Regle::class);

        $validated = $request->validate([
            'motif' => 'required|max:255|string',
            'montant' => 'required|numeric',
        ]);

        $regle = $banque->regles()->create($validated);

        return new RegleResource($regle);
    }
}
