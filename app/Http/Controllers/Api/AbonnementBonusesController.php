<?php

namespace App\Http\Controllers\Api;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BonusResource;
use App\Http\Resources\BonusCollection;

class AbonnementBonusesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Abonnement $abonnement)
    {
        $this->authorize('view', $abonnement);

        $search = $request->get('search', '');

        $bonuses = $abonnement
            ->bonuses()
            ->search($search)
            ->latest()
            ->paginate();

        return new BonusCollection($bonuses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Abonnement $abonnement)
    {
        $this->authorize('create', Bonus::class);

        $validated = $request->validate([
            'type' => 'required|max:255|string',
            'duree' => 'required|date',
        ]);

        $bonus = $abonnement->bonuses()->create($validated);

        return new BonusResource($bonus);
    }
}
