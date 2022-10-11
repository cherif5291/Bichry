<?php

namespace App\Http\Controllers\Api;

use App\Models\ModulePack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModulePackResource;
use App\Http\Resources\ModulePackCollection;
use App\Http\Requests\ModulePackStoreRequest;
use App\Http\Requests\ModulePackUpdateRequest;

class ModulePackController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModulePack::class);

        $search = $request->get('search', '');

        $modulePacks = ModulePack::search($search)
            ->latest()
            ->paginate();

        return new ModulePackCollection($modulePacks);
    }

    /**
     * @param \App\Http\Requests\ModulePackStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModulePackStoreRequest $request)
    {
        $this->authorize('create', ModulePack::class);

        $validated = $request->validated();

        $modulePack = ModulePack::create($validated);

        return new ModulePackResource($modulePack);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModulePack $modulePack
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModulePack $modulePack)
    {
        $this->authorize('view', $modulePack);

        return new ModulePackResource($modulePack);
    }

    /**
     * @param \App\Http\Requests\ModulePackUpdateRequest $request
     * @param \App\Models\ModulePack $modulePack
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModulePackUpdateRequest $request,
        ModulePack $modulePack
    ) {
        $this->authorize('update', $modulePack);

        $validated = $request->validated();

        $modulePack->update($validated);

        return new ModulePackResource($modulePack);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModulePack $modulePack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModulePack $modulePack)
    {
        $this->authorize('delete', $modulePack);

        $modulePack->delete();

        return response()->noContent();
    }
}
