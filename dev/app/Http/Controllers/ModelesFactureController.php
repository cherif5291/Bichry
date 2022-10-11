<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelesFacture;
use App\Http\Requests\ModelesFactureStoreRequest;
use App\Http\Requests\ModelesFactureUpdateRequest;

class ModelesFactureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ModelesFacture::class);

        $search = $request->get('search', '');

        $modelesFactures = ModelesFacture::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.modeles_factures.index',
            compact('modelesFactures', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ModelesFacture::class);

        return view('app.modeles_factures.create');
    }

    /**
     * @param \App\Http\Requests\ModelesFactureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelesFactureStoreRequest $request)
    {
        $this->authorize('create', ModelesFacture::class);

        $validated = $request->validated();

        $modelesFacture = ModelesFacture::create($validated);

        return redirect()
            ->route('modeles-factures.edit', $modelesFacture)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ModelesFacture $modelesFacture)
    {
        $this->authorize('view', $modelesFacture);

        return view('app.modeles_factures.show', compact('modelesFacture'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ModelesFacture $modelesFacture)
    {
        $this->authorize('update', $modelesFacture);

        return view('app.modeles_factures.edit', compact('modelesFacture'));
    }

    /**
     * @param \App\Http\Requests\ModelesFactureUpdateRequest $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function update(
        ModelesFactureUpdateRequest $request,
        ModelesFacture $modelesFacture
    ) {
        $this->authorize('update', $modelesFacture);

        $validated = $request->validated();

        $modelesFacture->update($validated);

        return redirect()
            ->route('modeles-factures.edit', $modelesFacture)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ModelesFacture $modelesFacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ModelesFacture $modelesFacture)
    {
        $this->authorize('delete', $modelesFacture);

        $modelesFacture->delete();

        return redirect()
            ->route('modeles-factures.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
