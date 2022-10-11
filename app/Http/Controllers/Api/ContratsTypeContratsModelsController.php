<?php

namespace App\Http\Controllers\Api;

use App\Models\ContratsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratsModelResource;
use App\Http\Resources\ContratsModelCollection;

class ContratsTypeContratsModelsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsType $contratsType
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ContratsType $contratsType)
    {
        $this->authorize('view', $contratsType);

        $search = $request->get('search', '');

        $contratsModels = $contratsType
            ->contratsModels()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratsModelCollection($contratsModels);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsType $contratsType
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ContratsType $contratsType)
    {
        $this->authorize('create', ContratsModel::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
        ]);

        $contratsModel = $contratsType->contratsModels()->create($validated);

        return new ContratsModelResource($contratsModel);
    }
}
