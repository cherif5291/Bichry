<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\AbonnementStoreRequest;
use App\Http\Requests\AbonnementUpdateRequest;

class AbonnementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Abonnement::class);

        $search = $request->get('search', '');

        $abonnements = Abonnement::search($search)
            ->latest()
            ->paginate(5);

        return view('app.abonnements.index', compact('abonnements', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Abonnement::class);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');

        return view('app.abonnements.create', compact('entreprises'));
    }

    /**
     * @param \App\Http\Requests\AbonnementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbonnementStoreRequest $request)
    {
        $this->authorize('create', Abonnement::class);

        $validated = $request->validated();

        $abonnement = Abonnement::create($validated);

        return redirect()
            ->route('abonnements.edit', $abonnement)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Abonnement $abonnement)
    {
        $this->authorize('view', $abonnement);

        return view('app.abonnements.show', compact('abonnement'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Abonnement $abonnement)
    {
        $this->authorize('update', $abonnement);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');

        return view(
            'app.abonnements.edit',
            compact('abonnement', 'entreprises')
        );
    }

    /**
     * @param \App\Http\Requests\AbonnementUpdateRequest $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(
        AbonnementUpdateRequest $request,
        Abonnement $abonnement
    ) {
        $this->authorize('update', $abonnement);

        $validated = $request->validated();

        $abonnement->update($validated);

        return redirect()
            ->route('abonnements.edit', $abonnement)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Abonnement $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Abonnement $abonnement)
    {
        $this->authorize('delete', $abonnement);

        $abonnement->delete();

        return redirect()
            ->route('abonnements.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
