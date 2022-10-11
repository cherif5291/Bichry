<?php

namespace App\Http\Controllers;

use App\Models\ModelesDevis;
use Illuminate\Http\Request;
use App\Http\Requests\ModelesDevisStoreRequest;
use App\Http\Requests\ModelesDevisUpdateRequest;

class ModelesDevisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesDevis::class);

        $search = $request->get('search', '');

        $allModelesDevis = ModelesDevis::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.all_modeles_devis.index',
            compact('allModelesDevis', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ModelesDevis::class);

        return view('app.all_modeles_devis.create');
    }

    /**
     * @param \App\Http\Requests\ModelesDevisStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesDevisStoreRequest $request)
    {
        $this->authorize('create', ModelesDevis::class);

        $validated = $request->validated();

        $modelesDevis = ModelesDevis::create($validated);

        return redirect()
            ->route('all-modeles-devis.edit', $modelesDevis)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('view', $modelesDevis);

        return view('app.all_modeles_devis.show', compact('modelesDevis'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('update', $modelesDevis);

        return view('app.all_modeles_devis.edit', compact('modelesDevis'));
    }

    /**
     * @param \App\Http\Requests\ModelesDevisUpdateRequest $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesDevisUpdateRequest $request,
        ModelesDevis $modelesDevis
    ) {
        $this->authorize('update', $modelesDevis);

        $validated = $request->validated();

        $modelesDevis->update($validated);

        return redirect()
            ->route('all-modeles-devis.edit', $modelesDevis)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesDevis $modelesDevis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesDevis $modelesDevis)
    {
        $this->authorize('delete', $modelesDevis);

        $modelesDevis->delete();

        return redirect()
            ->route('all-modeles-devis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
