<?php

namespace App\Http\Controllers\Api;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModulePackResource;
use App\Http\Resources\ModulePackCollection;

class PackageModulePacksController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Package $package)
    {
        $this->authorize('view', $package);

        $search = $request->get('search', '');

        $modulePacks = $package
            ->modulePacks()
            ->search($search)
            ->latest()
            ->paginate();

        return new ModulePackCollection($modulePacks);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Package $package)
    {
        $this->authorize('create', ModulePack::class);

        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
        ]);

        $modulePack = $package->modulePacks()->create($validated);

        return new ModulePackResource($modulePack);
    }
}
