<?php

namespace App\Http\Controllers;

use App\Models\Impot;
use Illuminate\Http\Request;
use App\Http\Requests\ImpotStoreRequest;
use App\Http\Requests\ImpotUpdateRequest;

class ImpotController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Impot::class);

        $search = $request->get('search', '');

        $impots = Impot::search($search)
            ->latest()
            ->paginate(5);

        return view('app.impots.index', compact('impots', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Impot::class);

        return view('app.impots.create');
    }

    /**
     * @param \App\Http\Requests\ImpotStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImpotStoreRequest $request)
    {
        $this->authorize('create', Impot::class);

        $validated = $request->validated();

        $impot = Impot::create($validated);

        return redirect()
            ->route('impots.edit', $impot)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Impot $impot)
    {
        $this->authorize('view', $impot);

        return view('app.impots.show', compact('impot'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Impot $impot)
    {
        $this->authorize('update', $impot);

        return view('app.impots.edit', compact('impot'));
    }

    /**
     * @param \App\Http\Requests\ImpotUpdateRequest $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function update(ImpotUpdateRequest $request, Impot $impot)
    {
        $this->authorize('update', $impot);

        $validated = $request->validated();

        $impot->update($validated);

        return redirect()
            ->route('impots.edit', $impot)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Impot $impot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Impot $impot)
    {
        $this->authorize('delete', $impot);

        $impot->delete();

        return redirect()
            ->route('impots.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
