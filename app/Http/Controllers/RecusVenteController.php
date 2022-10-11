<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Banque;
use App\Models\Article;
use App\Models\RecusVente;
use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;
use App\Http\Requests\RecusVenteStoreRequest;
use App\Http\Requests\RecusVenteUpdateRequest;

class RecusVenteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RecusVente::class);

        $search = $request->get('search', '');

        $recusVentes = RecusVente::search($search)
            ->latest()
            ->paginate(5);

        return view('app.recus_ventes.index', compact('recusVentes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RecusVente::class);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $articles = Article::pluck('nom', 'id');
        $paiementsModes = PaiementsMode::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');
        $banques = Banque::pluck('nom', 'id');

        return view(
            'app.recus_ventes.create',
            compact(
                'clientsEntreprises',
                'articles',
                'paiementsModes',
                'caisses',
                'banques'
            )
        );
    }

    /**
     * @param \App\Http\Requests\RecusVenteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecusVenteStoreRequest $request)
    {
        $this->authorize('create', RecusVente::class);

        $validated = $request->validated();

        $recusVente = RecusVente::create($validated);

        return redirect()
            ->route('recus-ventes.edit', $recusVente)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RecusVente $recusVente)
    {
        $this->authorize('view', $recusVente);

        return view('app.recus_ventes.show', compact('recusVente'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RecusVente $recusVente)
    {
        $this->authorize('update', $recusVente);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $articles = Article::pluck('nom', 'id');
        $paiementsModes = PaiementsMode::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');
        $banques = Banque::pluck('nom', 'id');

        return view(
            'app.recus_ventes.edit',
            compact(
                'recusVente',
                'clientsEntreprises',
                'articles',
                'paiementsModes',
                'caisses',
                'banques'
            )
        );
    }

    /**
     * @param \App\Http\Requests\RecusVenteUpdateRequest $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function update(
        RecusVenteUpdateRequest $request,
        RecusVente $recusVente
    ) {
        $this->authorize('update', $recusVente);

        $validated = $request->validated();

        $recusVente->update($validated);

        return redirect()
            ->route('recus-ventes.edit', $recusVente)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RecusVente $recusVente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RecusVente $recusVente)
    {
        $this->authorize('delete', $recusVente);

        $recusVente->delete();

        return redirect()
            ->route('recus-ventes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
