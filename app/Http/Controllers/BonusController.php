<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Requests\BonusStoreRequest;
use App\Http\Requests\BonusUpdateRequest;

class BonusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Bonus::class);

        $search = $request->get('search', '');

        $bonuses = Bonus::search($search)
            ->latest()
            ->paginate(5);

        return view('app.bonuses.index', compact('bonuses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Bonus::class);

        $abonnements = Abonnement::pluck('expiration', 'id');

        return view('app.bonuses.create', compact('abonnements'));
    }

    /**
     * @param \App\Http\Requests\BonusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BonusStoreRequest $request)
    {
        $this->authorize('create', Bonus::class);

        $validated = $request->validated();

        $bonus = Bonus::create($validated);

        return redirect()
            ->route('bonuses.edit', $bonus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bonus $bonus)
    {
        $this->authorize('view', $bonus);

        return view('app.bonuses.show', compact('bonus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Bonus $bonus)
    {
        $this->authorize('update', $bonus);

        $abonnements = Abonnement::pluck('expiration', 'id');

        return view('app.bonuses.edit', compact('bonus', 'abonnements'));
    }

    /**
     * @param \App\Http\Requests\BonusUpdateRequest $request
     * @param \App\Models\Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(BonusUpdateRequest $request, Bonus $bonus)
    {
        $this->authorize('update', $bonus);

        $validated = $request->validated();

        $bonus->update($validated);

        return redirect()
            ->route('bonuses.edit', $bonus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bonus $bonus)
    {
        $this->authorize('delete', $bonus);

        $bonus->delete();

        return redirect()
            ->route('bonuses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
