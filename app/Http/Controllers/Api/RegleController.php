<?php

namespace App\Http\Controllers\Api;

use App\Models\Regle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegleResource;
use App\Http\Resources\RegleCollection;
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
            ->paginate();

        return new RegleCollection($regles);
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

        return new RegleResource($regle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Regle $regle)
    {
        $this->authorize('view', $regle);

        return new RegleResource($regle);
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

        return new RegleResource($regle);
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

        return response()->noContent();
    }
}
