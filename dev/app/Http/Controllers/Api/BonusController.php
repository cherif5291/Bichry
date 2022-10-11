<?php

namespace App\Http\Controllers\Api;

use App\Models\Bonus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BonusResource;
use App\Http\Resources\BonusCollection;
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
            ->paginate();

        return new BonusCollection($bonuses);
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

        return new BonusResource($bonus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bonus $bonus)
    {
        $this->authorize('view', $bonus);

        return new BonusResource($bonus);
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

        return new BonusResource($bonus);
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

        return response()->noContent();
    }
}
