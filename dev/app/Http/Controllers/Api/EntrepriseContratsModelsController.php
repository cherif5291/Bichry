<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratsModelResource;
use App\Http\Resources\ContratsModelCollection;

class EntrepriseContratsModelsController extends Controller
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

        $contratsModels = $entreprise
            ->contratsModels()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratsModelCollection($contratsModels);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', ContratsModel::class);

        $validated = $request->validate([
            'contrats_type_id' => 'required|exists:contrats_types,id',
        ]);

        $contratsModel = $entreprise->contratsModels()->create($validated);

        return new ContratsModelResource($contratsModel);
    }
}
