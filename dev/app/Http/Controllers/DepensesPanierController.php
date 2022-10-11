<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Facture;

use Illuminate\Http\Request;
use App\Models\DepensesPanier;
use App\Models\ClientsEntreprise;
use App\Http\Requests\DepensesPanierStoreRequest;
use App\Http\Requests\DepensesPanierUpdateRequest;

class DepensesPanierController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DepensesPanier::class);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $depenses = Depense::pluck('source', 'id');

        return view(
            'app.depenses_paniers.create',
            compact('clientsEntreprises', 'depenses')
        );
    }

    /**
     * @param \App\Http\Requests\DepensesPanierStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepensesPanierStoreRequest $request)
    {
        $this->authorize('create', DepensesPanier::class);

        $validated = $request->validated();

        $depensesPanier = DepensesPanier::create($validated);

        return redirect()
            ->route('depenses-paniers.edit', $depensesPanier)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DepensesPanier $depensesPanier)
    {
        $this->authorize('view', $depensesPanier);

        return view('app.depenses_paniers.show', compact('depensesPanier'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DepensesPanier $depensesPanier)
    {
        $this->authorize('update', $depensesPanier);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $depenses = Depense::pluck('source', 'id');

        return view(
            'app.depenses_paniers.edit',
            compact('depensesPanier', 'clientsEntreprises', 'depenses')
        );
    }

    /**
     * @param \App\Http\Requests\DepensesPanierUpdateRequest $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function update(
        DepensesPanierUpdateRequest $request,
        DepensesPanier $depensesPanier
    ) {
        $this->authorize('update', $depensesPanier);

        $validated = $request->validated();

        $depensesPanier->update($validated);

        return redirect()
            ->route('depenses-paniers.edit', $depensesPanier)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DepensesPanier $depensesPanier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pannier = DepensesPanier::find($id);
        //dd($pannier);
        if ($pannier->depense_id) {
            $articles = DepensesPanier::where('depense_id', $pannier->depense_id)->get();
            $depense = Depense::find($pannier->depense_id);
            $depense->total = $articles->sum('total') - $pannier->total;
            $depense->total_sans_taxe = $articles->sum('montant') - $pannier->montant;
            $depense->taxe = $articles->sum('montant_taxe') - $pannier->montant_taxe;
            $depense->update();
        }

        if ($pannier->facture_id) {
            $articles = DepensesPanier::where('facture_id', $pannier->facture_id)->get();
            $facture = Facture::find($pannier->facture_id);
            $facture->total = $articles->sum('total') - $pannier->total;
            $facture->total_sans_taxe = $articles->sum('montant') - $pannier->montant;
            $facture->taxe = $articles->sum('montant_taxe') - $pannier->montant_taxe;
            $facture->update();
        }
        $pannier->delete();
        return "Article supprimer avec succès";
    }

}
