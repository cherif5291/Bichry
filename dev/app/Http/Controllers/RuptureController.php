<?php

namespace App\Http\Controllers;

use App\Models\Rupture;
use App\Models\Invitation;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\RuptureStoreRequest;
use App\Http\Requests\RuptureUpdateRequest;

class RuptureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Rupture::class);

        $search = $request->get('search', '');

        $ruptures = Rupture::search($search)
            ->latest()
            ->paginate(5);

        return view('app.ruptures.index', compact('ruptures', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Rupture::class);

        $invitations = Invitation::pluck('id', 'id');
        $entreprises = Entreprise::pluck('nom_entreprise', 'id');

        return view(
            'app.ruptures.create',
            compact('invitations', 'entreprises')
        );
    }

    /**
     * @param \App\Http\Requests\RuptureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuptureStoreRequest $request)
    {
        $this->authorize('create', Rupture::class);

        $validated = $request->validated();

        $rupture = Rupture::create($validated);

        return redirect()
            ->route('ruptures.edit', $rupture)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rupture $rupture)
    {
        $this->authorize('view', $rupture);

        return view('app.ruptures.show', compact('rupture'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Rupture $rupture)
    {
        $this->authorize('update', $rupture);

        $invitations = Invitation::pluck('id', 'id');
        $entreprises = Entreprise::pluck('nom_entreprise', 'id');

        return view(
            'app.ruptures.edit',
            compact('rupture', 'invitations', 'entreprises')
        );
    }

    /**
     * @param \App\Http\Requests\RuptureUpdateRequest $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function update(RuptureUpdateRequest $request, Rupture $rupture)
    {
        $this->authorize('update', $rupture);

        $validated = $request->validated();

        $rupture->update($validated);

        return redirect()
            ->route('ruptures.edit', $rupture)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rupture $rupture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rupture $rupture)
    {
        $this->authorize('delete', $rupture);

        $rupture->delete();

        return redirect()
            ->route('ruptures.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
