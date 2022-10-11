<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployesEntrepriseResource;
use App\Http\Resources\EmployesEntrepriseCollection;
use App\Http\Requests\EmployesEntrepriseStoreRequest;
use App\Http\Requests\EmployesEntrepriseUpdateRequest;

class EmployesEntrepriseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EmployesEntreprise::class);

        $search = $request->get('search', '');

        $employesEntreprises = EmployesEntreprise::search($search)
            ->latest()
            ->paginate();

        return new EmployesEntrepriseCollection($employesEntreprises);
    }

    /**
     * @param \App\Http\Requests\EmployesEntrepriseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployesEntrepriseStoreRequest $request)
    {
        $this->authorize('create', EmployesEntreprise::class);

        $validated = $request->validated();

        $employesEntreprise = EmployesEntreprise::create($validated);

        return new EmployesEntrepriseResource($employesEntreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('view', $employesEntreprise);

        return new EmployesEntrepriseResource($employesEntreprise);
    }

    /**
     * @param \App\Http\Requests\EmployesEntrepriseUpdateRequest $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function update(
        EmployesEntrepriseUpdateRequest $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('update', $employesEntreprise);

        $validated = $request->validated();

        $employesEntreprise->update($validated);

        return new EmployesEntrepriseResource($employesEntreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('delete', $employesEntreprise);

        $employesEntreprise->delete();

        return response()->noContent();
    }
}
