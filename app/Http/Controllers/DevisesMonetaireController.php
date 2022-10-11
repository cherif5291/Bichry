<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DevisesMonetaire;
use App\Http\Requests\DevisesMonetaireStoreRequest;
use App\Http\Requests\DevisesMonetaireUpdateRequest;

class DevisesMonetaireController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DevisesMonetaire::class);

        $search = $request->get('search', '');

        $devisesMonetaires = DevisesMonetaire::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.devises_monetaires.index',
            compact('devisesMonetaires', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DevisesMonetaire::class);

        return view('app.devises_monetaires.create');
    }

    /**
     * @param \App\Http\Requests\DevisesMonetaireStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisesMonetaireStoreRequest $request)
    {
        $this->authorize('create', DevisesMonetaire::class);

        $validated = $request->validated();

        $devisesMonetaire = DevisesMonetaire::create($validated);

        return redirect()
            ->route('devises-monetaires.edit', $devisesMonetaire)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DevisesMonetaire $devisesMonetaire)
    {
        $this->authorize('view', $devisesMonetaire);

        return view('app.devises_monetaires.show', compact('devisesMonetaire'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DevisesMonetaire $devisesMonetaire)
    {
        $this->authorize('update', $devisesMonetaire);

        return view('app.devises_monetaires.edit', compact('devisesMonetaire'));
    }

    /**
     * @param \App\Http\Requests\DevisesMonetaireUpdateRequest $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function update(
        DevisesMonetaireUpdateRequest $request,
        DevisesMonetaire $devisesMonetaire
    ) {
        $this->authorize('update', $devisesMonetaire);

        $validated = $request->validated();

        $devisesMonetaire->update($validated);

        return redirect()
            ->route('devises-monetaires.edit', $devisesMonetaire)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        DevisesMonetaire $devisesMonetaire
    ) {
        $this->authorize('delete', $devisesMonetaire);

        $devisesMonetaire->delete();

        return redirect()
            ->route('devises-monetaires.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
