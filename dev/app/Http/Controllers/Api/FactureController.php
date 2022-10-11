<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FactureResource;
use App\Http\Resources\FactureCollection;
use App\Http\Requests\FactureStoreRequest;
use App\Http\Requests\FactureUpdateRequest;

class FactureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Facture::class);

        $search = $request->get('search', '');

        $factures = Facture::search($search)
            ->latest()
            ->paginate();

        return new FactureCollection($factures);
    }

    /**
     * @param \App\Http\Requests\FactureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FactureStoreRequest $request)
    {
        $this->authorize('create', Facture::class);

        $validated = $request->validated();

        $facture = Facture::create($validated);

        return new FactureResource($facture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Facture $facture)
    {
        $this->authorize('view', $facture);

        return new FactureResource($facture);
    }

    /**
     * @param \App\Http\Requests\FactureUpdateRequest $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function update(FactureUpdateRequest $request, Facture $facture)
    {
        $this->authorize('update', $facture);

        $validated = $request->validated();

        $facture->update($validated);

        return new FactureResource($facture);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Facture $facture)
    {
        $this->authorize('delete', $facture);

        $facture->delete();

        return response()->noContent();
    }
}
