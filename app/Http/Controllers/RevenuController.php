<?php

namespace App\Http\Controllers;

use App\Models\Revenu;
use Illuminate\Http\Request;
use App\Http\Requests\RevenuStoreRequest;
use App\Http\Requests\RevenuUpdateRequest;

class RevenuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Revenu::class);

        $search = $request->get('search', '');

        $revenus = Revenu::search($search)
            ->latest()
            ->paginate(5);

        return view('app.revenus.index', compact('revenus', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Revenu::class);

        return view('app.revenus.create');
    }

    /**
     * @param \App\Http\Requests\RevenuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevenuStoreRequest $request)
    {
        $this->authorize('create', Revenu::class);

        $validated = $request->validated();

        $revenu = Revenu::create($validated);

        return redirect()
            ->route('revenus.edit', $revenu)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Revenu $revenu)
    {
        $this->authorize('view', $revenu);

        return view('app.revenus.show', compact('revenu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Revenu $revenu)
    {
        $this->authorize('update', $revenu);

        return view('app.revenus.edit', compact('revenu'));
    }

    /**
     * @param \App\Http\Requests\RevenuUpdateRequest $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function update(RevenuUpdateRequest $request, Revenu $revenu)
    {
        $this->authorize('update', $revenu);

        $validated = $request->validated();

        $revenu->update($validated);

        return redirect()
            ->route('revenus.edit', $revenu)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Revenu $revenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Revenu $revenu)
    {
        $this->authorize('delete', $revenu);

        $revenu->delete();

        return redirect()
            ->route('revenus.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
