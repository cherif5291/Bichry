<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Http\Resources\ModuleCollection;
use App\Http\Requests\ModuleStoreRequest;
use App\Http\Requests\ModuleUpdateRequest;

class ModuleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Module::class);

        $search = $request->get('search', '');

        $modules = Module::search($search)
            ->latest()
            ->paginate();

        return new ModuleCollection($modules);
    }

    /**
     * @param \App\Http\Requests\ModuleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleStoreRequest $request)
    {
        $this->authorize('create', Module::class);

        $validated = $request->validated();

        $module = Module::create($validated);

        return new ModuleResource($module);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Module $module)
    {
        $this->authorize('view', $module);

        return new ModuleResource($module);
    }

    /**
     * @param \App\Http\Requests\ModuleUpdateRequest $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleUpdateRequest $request, Module $module)
    {
        $this->authorize('update', $module);

        $validated = $request->validated();

        $module->update($validated);

        return new ModuleResource($module);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Module $module)
    {
        $this->authorize('delete', $module);

        $module->delete();

        return response()->noContent();
    }
}
