<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratsTypeResource;
use App\Http\Resources\ContratsTypeCollection;

class EntrepriseContratsTypesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $contratsTypes = $entreprise
            ->contratsTypes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratsTypeCollection($contratsTypes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', ContratsType::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
        ]);

        $contratsType = $entreprise->contratsTypes()->create($validated);

        return new ContratsTypeResource($contratsType);
    }
}
