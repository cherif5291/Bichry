<?php

namespace App\Http\Controllers\Api;

use App\Models\InfosSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InfosSystemResource;
use App\Http\Resources\InfosSystemCollection;
use App\Http\Requests\InfosSystemStoreRequest;
use App\Http\Requests\InfosSystemUpdateRequest;

class InfosSystemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InfosSystem::class);

        $search = $request->get('search', '');

        $infosSystems = InfosSystem::search($search)
            ->latest()
            ->paginate();

        return new InfosSystemCollection($infosSystems);
    }

    /**
     * @param \App\Http\Requests\InfosSystemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfosSystemStoreRequest $request)
    {
        $this->authorize('create', InfosSystem::class);

        $validated = $request->validated();

        $infosSystem = InfosSystem::create($validated);

        return new InfosSystemResource($infosSystem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InfosSystem $infosSystem)
    {
        $this->authorize('view', $infosSystem);

        return new InfosSystemResource($infosSystem);
    }

    /**
     * @param \App\Http\Requests\InfosSystemUpdateRequest $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function update(
        InfosSystemUpdateRequest $request,
        InfosSystem $infosSystem
    ) {
        $this->authorize('update', $infosSystem);

        $validated = $request->validated();

        $infosSystem->update($validated);

        return new InfosSystemResource($infosSystem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InfosSystem $infosSystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InfosSystem $infosSystem)
    {
        $this->authorize('delete', $infosSystem);

        $infosSystem->delete();

        return response()->noContent();
    }
}
