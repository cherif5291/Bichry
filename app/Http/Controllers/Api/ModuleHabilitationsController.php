<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabilitationResource;
use App\Http\Resources\HabilitationCollection;

class ModuleHabilitationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Module $module)
    {
        $this->authorize('view', $module);

        $search = $request->get('search', '');

        $habilitations = $module
            ->habilitations()
            ->search($search)
            ->latest()
            ->paginate();

        return new HabilitationCollection($habilitations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $this->authorize('create', Habilitation::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'habilitation' => 'required|max:255|string',
            'fonctionnalite_id' => 'required|exists:fonctionnalites,id',
        ]);

        $habilitation = $module->habilitations()->create($validated);

        return new HabilitationResource($habilitation);
    }
}
