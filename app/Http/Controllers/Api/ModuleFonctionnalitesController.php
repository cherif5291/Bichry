<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FonctionnaliteResource;
use App\Http\Resources\FonctionnaliteCollection;

class ModuleFonctionnalitesController extends Controller
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

        $fonctionnalites = $module
            ->fonctionnalites()
            ->search($search)
            ->latest()
            ->paginate();

        return new FonctionnaliteCollection($fonctionnalites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $this->authorize('create', Fonctionnalite::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'voir' => 'required|max:255|string',
            'ajouter' => 'required|max:255|string',
            'supprimer' => 'required|max:255|string',
            'modifier' => 'required|max:255|string',
            'exporter' => 'required|max:255|string',
        ]);

        $fonctionnalite = $module->fonctionnalites()->create($validated);

        return new FonctionnaliteResource($fonctionnalite);
    }
}
