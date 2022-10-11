<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EntrepriseResource;
use App\Http\Resources\EntrepriseCollection;
use App\Http\Requests\EntrepriseStoreRequest;
use App\Http\Requests\EntrepriseUpdateRequest;

class EntrepriseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Entreprise::class);

        $search = $request->get('search', '');

        $entreprises = Entreprise::search($search)
            ->latest()
            ->paginate();

        return new EntrepriseCollection($entreprises);
    }

    /**
     * @param \App\Http\Requests\EntrepriseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntrepriseStoreRequest $request)
    {
        $this->authorize('create', Entreprise::class);

        $validated = $request->validated();

        $entreprise = Entreprise::create($validated);

        return new EntrepriseResource($entreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        return new EntrepriseResource($entreprise);
    }

    /**
     * @param \App\Http\Requests\EntrepriseUpdateRequest $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update(
        EntrepriseUpdateRequest $request,
        Entreprise $entreprise
    ) {
        $this->authorize('update', $entreprise);

        $validated = $request->validated();

        $entreprise->update($validated);

        return new EntrepriseResource($entreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Entreprise $entreprise)
    {
        $this->authorize('delete', $entreprise);

        $entreprise->delete();

        return response()->noContent();
    }
}
