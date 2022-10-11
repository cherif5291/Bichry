<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\BanqueStoreRequest;
use App\Http\Requests\BanqueUpdateRequest;

class BanqueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$this->authorize('view-any', Banque::class);
        $PageName = "Banque";
        $search = $request->get('search', '');

        $banques = Banque::search($search)
            ->where('entreprise_id', auth()->user()->entreprise_id)
            ->latest()
            ->paginate(5);

        return view('entreprise.banque.index', compact('banques', 'search', 'PageName'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$this->authorize('create', Banque::class);
        $PageName = "Ajout Banque";
        $banques = Banque::where('entreprise_id', auth()->user()->entreprise_id)
            ->latest()
            ->paginate(3);
        //$entreprises = Entreprise::pluck('nom_entreprise', 'id');

        return view('entreprise.banque.create', compact('PageName', 'banques'));
    }

    /**
     * @param \App\Http\Requests\BanqueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BanqueStoreRequest $request)
    {
        //$this->authorize('create', Banque::class);

        $validated = $request->validated();
        $validated['entreprise_id'] = auth()->user()->entreprise_id;
        //dd($validated);
        $banque = Banque::create($validated);

        return back()->withSuccess(__('Banque créer avec succès'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Banque $banque)
    {
        //$this->authorize('view', $banque);

        return view('app.banques.show', compact('banque'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Banque $banque)
    {
        //$this->authorize('update', $banque);

        //$entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $PageName = "Modification Banque";
        $banques = Banque::where('entreprise_id', auth()->user()->entreprise_id)
            ->latest()
            ->paginate(3);

        return view('entreprise.banque.edit', compact('banque', 'banques', 'PageName'));
    }

    /**
     * @param \App\Http\Requests\BanqueUpdateRequest $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function update(BanqueUpdateRequest $request, Banque $banque)
    {
        //$this->authorize('update', $banque);

        $validated = $request->validated();

        $banque->update($validated);

        return back()->withSuccess(__('Banque modifier avec succès'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banque $banque)
    {
        //$this->authorize('delete', $banque);

        $banque->delete();

        return redirect()
            ->route('banques.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
