<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabilitationResource;
use App\Http\Resources\HabilitationCollection;

class UserHabilitationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $habilitations = $user
            ->habilitations()
            ->search($search)
            ->latest()
            ->paginate();

        return new HabilitationCollection($habilitations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Habilitation::class);

        $validated = $request->validate([
            'habilitation' => 'required|max:255|string',
            'module_id' => 'required|exists:modules,id',
            'fonctionnalite_id' => 'required|exists:fonctionnalites,id',
        ]);

        $habilitation = $user->habilitations()->create($validated);

        return new HabilitationResource($habilitation);
    }
}
