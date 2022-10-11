<?php

namespace App\Http\Controllers\Api;

use App\Models\Habilitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabilitationResource;
use App\Http\Resources\HabilitationCollection;
use App\Http\Requests\HabilitationStoreRequest;
use App\Http\Requests\HabilitationUpdateRequest;

class HabilitationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Habilitation::class);

        $search = $request->get('search', '');

        $habilitations = Habilitation::search($search)
            ->latest()
            ->paginate();

        return new HabilitationCollection($habilitations);
    }

    /**
     * @param \App\Http\Requests\HabilitationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilitationStoreRequest $request)
    {
        $this->authorize('create', Habilitation::class);

        $validated = $request->validated();

        $habilitation = Habilitation::create($validated);

        return new HabilitationResource($habilitation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Habilitation $habilitation)
    {
        $this->authorize('view', $habilitation);

        return new HabilitationResource($habilitation);
    }

    /**
     * @param \App\Http\Requests\HabilitationUpdateRequest $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function update(
        HabilitationUpdateRequest $request,
        Habilitation $habilitation
    ) {
        $this->authorize('update', $habilitation);

        $validated = $request->validated();

        $habilitation->update($validated);

        return new HabilitationResource($habilitation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Habilitation $habilitation)
    {
        $this->authorize('delete', $habilitation);

        $habilitation->delete();

        return response()->noContent();
    }
}
