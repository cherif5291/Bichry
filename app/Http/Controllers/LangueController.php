<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;
use App\Http\Requests\LangueStoreRequest;
use App\Http\Requests\LangueUpdateRequest;

class LangueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Langue::class);

        $search = $request->get('search', '');

        $langues = Langue::search($search)
            ->latest()
            ->paginate(5);

        return view('app.langues.index', compact('langues', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Langue::class);

        return view('app.langues.create');
    }

    /**
     * @param \App\Http\Requests\LangueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LangueStoreRequest $request)
    {
        $this->authorize('create', Langue::class);

        $validated = $request->validated();

        $langue = Langue::create($validated);

        return redirect()
            ->route('langues.edit', $langue)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Langue $langue)
    {
        $this->authorize('view', $langue);

        return view('app.langues.show', compact('langue'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Langue $langue)
    {
        $this->authorize('update', $langue);

        return view('app.langues.edit', compact('langue'));
    }

    /**
     * @param \App\Http\Requests\LangueUpdateRequest $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function update(LangueUpdateRequest $request, Langue $langue)
    {
        $this->authorize('update', $langue);

        $validated = $request->validated();

        $langue->update($validated);

        return redirect()
            ->route('langues.edit', $langue)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Langue $langue)
    {
        $this->authorize('delete', $langue);

        $langue->delete();

        return redirect()
            ->route('langues.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
