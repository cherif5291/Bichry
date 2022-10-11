<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Requests\DevisStoreRequest;
use App\Http\Requests\DevisUpdateRequest;

class DevisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Devis::class);

        $search = $request->get('search', '');

        $allDevis = Devis::search($search)
            ->latest()
            ->paginate(5);

        return view('app.all_devis.index', compact('allDevis', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Devis::class);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');

        return view(
            'app.all_devis.create',
            compact('entreprises', 'clientsEntreprises')
        );
    }

    /**
     * @param \App\Http\Requests\DevisStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisStoreRequest $request)
    {
        $this->authorize('create', Devis::class);

        $validated = $request->validated();

        $devis = Devis::create($validated);

        return redirect()
            ->route('all-devis.edit', $devis)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Devis $devis)
    {
        $this->authorize('view', $devis);

        return view('app.all_devis.show', compact('devis'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Devis $devis)
    {
        $this->authorize('update', $devis);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');

        return view(
            'app.all_devis.edit',
            compact('devis', 'entreprises', 'clientsEntreprises')
        );
    }

    /**
     * @param \App\Http\Requests\DevisUpdateRequest $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function update(DevisUpdateRequest $request, Devis $devis)
    {
        $this->authorize('update', $devis);

        $validated = $request->validated();

        $devis->update($validated);

        return redirect()
            ->route('all-devis.edit', $devis)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Devis $devis)
    {
        $this->authorize('delete', $devis);

        $devis->delete();

        return redirect()
            ->route('all-devis.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
