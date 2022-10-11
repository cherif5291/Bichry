<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepenseResource;
use App\Http\Resources\DepenseCollection;

class PaiementsModeDepensesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('view', $paiementsMode);

        $search = $request->get('search', '');

        $depenses = $paiementsMode
            ->depenses()
            ->search($search)
            ->latest()
            ->paginate();

        return new DepenseCollection($depenses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('create', Depense::class);

        $validated = $request->validate([
            'client_id' => 'required|exists:entreprises,id',
            'reference' => 'required|max:255',
            'note' => 'required|max:255|string',
            'source' => 'required|max:255|string',
        ]);

        $depense = $paiementsMode->depenses()->create($validated);

        return new DepenseResource($depense);
    }
}
