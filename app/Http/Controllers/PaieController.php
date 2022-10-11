<?php

namespace App\Http\Controllers;

use App\Models\Paie;
use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Requests\PaieStoreRequest;
use App\Http\Requests\PaieUpdateRequest;

class PaieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Paie::class);

        $search = $request->get('search', '');

        $paies = Paie::search($search)
            ->latest()
            ->paginate(5);

        return view('app.paies.index', compact('paies', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Paie::class);

        $employesEntreprises = EmployesEntreprise::pluck('prenom', 'id');

        return view('app.paies.create', compact('employesEntreprises'));
    }

    /**
     * @param \App\Http\Requests\PaieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaieStoreRequest $request)
    {
        $this->authorize('create', Paie::class);

        $validated = $request->validated();

        $paie = Paie::create($validated);

        return redirect()
            ->route('paies.edit', $paie)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Paie $paie)
    {
        $this->authorize('view', $paie);

        return view('app.paies.show', compact('paie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Paie $paie)
    {
        $this->authorize('update', $paie);

        $employesEntreprises = EmployesEntreprise::pluck('prenom', 'id');

        return view('app.paies.edit', compact('paie', 'employesEntreprises'));
    }

    /**
     * @param \App\Http\Requests\PaieUpdateRequest $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function update(PaieUpdateRequest $request, Paie $paie)
    {
        $this->authorize('update', $paie);

        $validated = $request->validated();

        $paie->update($validated);

        return redirect()
            ->route('paies.edit', $paie)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Paie $paie)
    {
        $this->authorize('delete', $paie);

        $paie->delete();

        return redirect()
            ->route('paies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
