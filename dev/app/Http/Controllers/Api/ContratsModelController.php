<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ContratsModel;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratsModelResource;
use App\Http\Resources\ContratsModelCollection;
use App\Http\Requests\ContratsModelStoreRequest;
use App\Http\Requests\ContratsModelUpdateRequest;

class ContratsModelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ContratsModel::class);

        $search = $request->get('search', '');

        $contratsModels = ContratsModel::search($search)
            ->latest()
            ->paginate();

        return new ContratsModelCollection($contratsModels);
    }

    /**
     * @param \App\Http\Requests\ContratsModelStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratsModelStoreRequest $request)
    {
        $this->authorize('create', ContratsModel::class);

        $validated = $request->validated();

        $contratsModel = ContratsModel::create($validated);

        return new ContratsModelResource($contratsModel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsModel $contratsModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ContratsModel $contratsModel)
    {
        $this->authorize('view', $contratsModel);

        return new ContratsModelResource($contratsModel);
    }

    /**
     * @param \App\Http\Requests\ContratsModelUpdateRequest $request
     * @param \App\Models\ContratsModel $contratsModel
     * @return \Illuminate\Http\Response
     */
    public function update(
        ContratsModelUpdateRequest $request,
        ContratsModel $contratsModel
    ) {
        $this->authorize('update', $contratsModel);

        $validated = $request->validated();

        $contratsModel->update($validated);

        return new ContratsModelResource($contratsModel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ContratsModel $contratsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ContratsModel $contratsModel)
    {
        $this->authorize('delete', $contratsModel);

        $contratsModel->delete();

        return response()->noContent();
    }
}
