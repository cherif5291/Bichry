<?php

namespace App\Http\Controllers;

use App\Models\Regle;
use App\Models\Banque;
use Illuminate\Http\Request;
use App\Http\Requests\RegleStoreRequest;
use App\Http\Requests\RegleUpdateRequest;

class RegleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Regle::class);

        $search = $request->get('search', '');

        $regles = Regle::search($search)
            ->latest()
            ->paginate(5);

        return view('app.regles.index', compact('regles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Regle::class);

        $banques = Banque::pluck('nom', 'id');

        return view('app.regles.create', compact('banques'));
    }

    /**
     * @param \App\Http\Requests\RegleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegleStoreRequest $request)
    {
        $this->authorize('create', Regle::class);

        $validated = $request->validated();

        $regle = Regle::create($validated);

        return redirect()
            ->route('regles.edit', $regle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Regle $regle)
    {
        $this->authorize('view', $regle);

        return view('app.regles.show', compact('regle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Regle $regle)
    {
        $this->authorize('update', $regle);

        $banques = Banque::pluck('nom', 'id');

        return view('app.regles.edit', compact('regle', 'banques'));
    }

    /**
     * @param \App\Http\Requests\RegleUpdateRequest $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function update(RegleUpdateRequest $request, Regle $regle)
    {
        $this->authorize('update', $regle);

        $validated = $request->validated();

        $regle->update($validated);

        return redirect()
            ->route('regles.edit', $regle)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Regle $regle)
    {
        $this->authorize('delete', $regle);

        $regle->delete();

        return redirect()
            ->route('regles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
