<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Package;
use App\Models\ModulePack;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.module_packs.index', compact('modulePacks', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ModulePack::class);

        $packages = Package::pluck('id', 'id');
        $modules = Module::pluck('nom', 'id');

        return view('app.module_packs.create', compact('packages', 'modules'));
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

        return redirect()
            ->route('module-packs.edit', $modulePack)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModulePack $modulePack
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModulePack $modulePack)
    {
        $this->authorize('view', $modulePack);

        return view('app.module_packs.show', compact('modulePack'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModulePack $modulePack
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ModulePack $modulePack)
    {
        $this->authorize('update', $modulePack);

        $packages = Package::pluck('id', 'id');
        $modules = Module::pluck('nom', 'id');

        return view(
            'app.module_packs.edit',
            compact('modulePack', 'packages', 'modules')
        );
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

        return redirect()
            ->route('module-packs.edit', $modulePack)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('module-packs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
