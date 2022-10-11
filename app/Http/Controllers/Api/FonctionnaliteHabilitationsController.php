<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Fonctionnalite;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabilitationResource;
use App\Http\Resources\HabilitationCollection;

class FonctionnaliteHabilitationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('view', $fonctionnalite);

        $search = $request->get('search', '');

        $habilitations = $fonctionnalite
            ->habilitations()
            ->search($search)
            ->latest()
            ->paginate();

        return new HabilitationCollection($habilitations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('create', Habilitation::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'habilitation' => 'required|max:255|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        $habilitation = $fonctionnalite->habilitations()->create($validated);

        return new HabilitationResource($habilitation);
    }
}
