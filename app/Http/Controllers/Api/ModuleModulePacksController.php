<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModulePackResource;
use App\Http\Resources\ModulePackCollection;

class ModuleModulePacksController extends Controller
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

        $modulePacks = $module
            ->modulePacks()
            ->search($search)
            ->latest()
            ->paginate();

        return new ModulePackCollection($modulePacks);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $this->authorize('create', ModulePack::class);

        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        $modulePack = $module->modulePacks()->create($validated);

        return new ModulePackResource($modulePack);
    }
}
