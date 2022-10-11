<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.modules.index', compact('modules', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Module::class);

        return view('app.modules.create');
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

        return redirect()
            ->route('modules.edit', $module)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Module $module)
    {
        $this->authorize('view', $module);

        return view('app.modules.show', compact('module'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Module $module)
    {
        $this->authorize('update', $module);

        return view('app.modules.edit', compact('module'));
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

        return redirect()
            ->route('modules.edit', $module)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('modules.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
