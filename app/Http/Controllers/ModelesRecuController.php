<?php

namespace App\Http\Controllers;

use App\Models\ModelesRecu;
use Illuminate\Http\Request;
use App\Http\Requests\ModelesRecuStoreRequest;
use App\Http\Requests\ModelesRecuUpdateRequest;

class ModelesRecuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesRecu::class);

        $search = $request->get('search', '');

        $modelesRecus = ModelesRecu::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.modeles_recus.index',
            compact('modelesRecus', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ModelesRecu::class);

        return view('app.modeles_recus.create');
    }

    /**
     * @param \App\Http\Requests\ModelesRecuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesRecuStoreRequest $request)
    {
        $this->authorize('create', ModelesRecu::class);

        $validated = $request->validated();

        $modelesRecu = ModelesRecu::create($validated);

        return redirect()
            ->route('modeles-recus.edit', $modelesRecu)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesRecu $modelesRecu)
    {
        $this->authorize('view', $modelesRecu);

        return view('app.modeles_recus.show', compact('modelesRecu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ModelesRecu $modelesRecu)
    {
        $this->authorize('update', $modelesRecu);

        return view('app.modeles_recus.edit', compact('modelesRecu'));
    }

    /**
     * @param \App\Http\Requests\ModelesRecuUpdateRequest $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesRecuUpdateRequest $request,
        ModelesRecu $modelesRecu
    ) {
        $this->authorize('update', $modelesRecu);

        $validated = $request->validated();

        $modelesRecu->update($validated);

        return redirect()
            ->route('modeles-recus.edit', $modelesRecu)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesRecu $modelesRecu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesRecu $modelesRecu)
    {
        $this->authorize('delete', $modelesRecu);

        $modelesRecu->delete();

        return redirect()
            ->route('modeles-recus.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
