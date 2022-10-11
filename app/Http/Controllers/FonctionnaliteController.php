<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Fonctionnalite;
use App\Http\Requests\FonctionnaliteStoreRequest;
use App\Http\Requests\FonctionnaliteUpdateRequest;
use App\Models\Habilitation;
use Illuminate\Support\Facades\Auth;

class FonctionnaliteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Fonctionnalite::class);

        $search = $request->get('search', '');

        $fonctionnalites = Fonctionnalite::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.fonctionnalites.index',
            compact('fonctionnalites', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Fonctionnalite::class);

        $modules = Module::pluck('nom', 'id');

        return view('app.fonctionnalites.create', compact('modules'));
    }

    /**
     * @param \App\Http\Requests\FonctionnaliteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FonctionnaliteStoreRequest $request)
    {
        $this->authorize('create', Fonctionnalite::class);

        $validated = $request->validated();

        $fonctionnalite = Fonctionnalite::create($validated);

        return redirect()
            ->route('fonctionnalites.edit', $fonctionnalite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('view', $fonctionnalite);

        return view('app.fonctionnalites.show', compact('fonctionnalite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PageName = "Habilitation";
        $Habilitations = Habilitation::all();
        $habilitation = Habilitation::find($id);
        return view('entreprise.parametres.habilitations.edit', compact('Habilitations', 'PageName', 'habilitation'));
    }

    /**
     * @param \App\Http\Requests\FonctionnaliteUpdateRequest $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function update(
        FonctionnaliteUpdateRequest $request,
        Fonctionnalite $fonctionnalite
    ) {
        $this->authorize('update', $fonctionnalite);

        $validated = $request->validated();

        $fonctionnalite->update($validated);

        return redirect()
            ->route('fonctionnalites.edit', $fonctionnalite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('delete', $fonctionnalite);

        $fonctionnalite->delete();

        return redirect()
            ->route('fonctionnalites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
