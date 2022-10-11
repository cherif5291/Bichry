<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RuptureResource;
use App\Http\Resources\RuptureCollection;

class EntrepriseRupturesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $ruptures = $entreprise
            ->ruptures()
            ->search($search)
            ->latest()
            ->paginate();

        return new RuptureCollection($ruptures);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Rupture::class);

        $validated = $request->validate([
            'invitation_id' => 'required|exists:invitations,id',
            'status' => 'nullable|max:255|string',
        ]);

        $rupture = $entreprise->ruptures()->create($validated);

        return new RuptureResource($rupture);
    }
}
