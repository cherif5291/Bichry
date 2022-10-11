<?php

namespace App\Http\Controllers\Api;

use App\Models\Taxe;
use Illuminate\Http\Request;
use App\Http\Resources\TaxeResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaxeCollection;
use App\Http\Requests\TaxeStoreRequest;
use App\Http\Requests\TaxeUpdateRequest;

class TaxeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Taxe::class);

        $search = $request->get('search', '');

        $taxes = Taxe::search($search)
            ->latest()
            ->paginate();

        return new TaxeCollection($taxes);
    }

    /**
     * @param \App\Http\Requests\TaxeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxeStoreRequest $request)
    {
        $this->authorize('create', Taxe::class);

        $validated = $request->validated();

        $taxe = Taxe::create($validated);

        return new TaxeResource($taxe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Taxe $taxe)
    {
        $this->authorize('view', $taxe);

        return new TaxeResource($taxe);
    }

    /**
     * @param \App\Http\Requests\TaxeUpdateRequest $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function update(TaxeUpdateRequest $request, Taxe $taxe)
    {
        $this->authorize('update', $taxe);

        $validated = $request->validated();

        $taxe->update($validated);

        return new TaxeResource($taxe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Taxe $taxe)
    {
        $this->authorize('delete', $taxe);

        $taxe->delete();

        return response()->noContent();
    }
}
