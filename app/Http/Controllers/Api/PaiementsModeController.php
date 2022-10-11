<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaiementsModeResource;
use App\Http\Resources\PaiementsModeCollection;
use App\Http\Requests\PaiementsModeStoreRequest;
use App\Http\Requests\PaiementsModeUpdateRequest;

class PaiementsModeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PaiementsMode::class);

        $search = $request->get('search', '');

        $paiementsModes = PaiementsMode::search($search)
            ->latest()
            ->paginate();

        return new PaiementsModeCollection($paiementsModes);
    }

    /**
     * @param \App\Http\Requests\PaiementsModeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaiementsModeStoreRequest $request)
    {
        $this->authorize('create', PaiementsMode::class);

        $validated = $request->validated();

        $paiementsMode = PaiementsMode::create($validated);

        return new PaiementsModeResource($paiementsMode);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('view', $paiementsMode);

        return new PaiementsModeResource($paiementsMode);
    }

    /**
     * @param \App\Http\Requests\PaiementsModeUpdateRequest $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function update(
        PaiementsModeUpdateRequest $request,
        PaiementsMode $paiementsMode
    ) {
        $this->authorize('update', $paiementsMode);

        $validated = $request->validated();

        $paiementsMode->update($validated);

        return new PaiementsModeResource($paiementsMode);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaiementsMode $paiementsMode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PaiementsMode $paiementsMode)
    {
        $this->authorize('delete', $paiementsMode);

        $paiementsMode->delete();

        return response()->noContent();
    }
}
