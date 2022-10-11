<?php

namespace App\Http\Controllers\Api;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\FournisseurCollection;
use App\Http\Requests\FournisseurStoreRequest;
use App\Http\Requests\FournisseurUpdateRequest;

class FournisseurController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Fournisseur::class);

        $search = $request->get('search', '');

        $fournisseurs = Fournisseur::search($search)
            ->latest()
            ->paginate();

        return new FournisseurCollection($fournisseurs);
    }

    /**
     * @param \App\Http\Requests\FournisseurStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FournisseurStoreRequest $request)
    {
        $this->authorize('create', Fournisseur::class);

        $validated = $request->validated();

        $fournisseur = Fournisseur::create($validated);

        return new FournisseurResource($fournisseur);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Fournisseur $fournisseur)
    {
        $this->authorize('view', $fournisseur);

        return new FournisseurResource($fournisseur);
    }

    /**
     * @param \App\Http\Requests\FournisseurUpdateRequest $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(
        FournisseurUpdateRequest $request,
        Fournisseur $fournisseur
    ) {
        $this->authorize('update', $fournisseur);

        $validated = $request->validated();

        $fournisseur->update($validated);

        return new FournisseurResource($fournisseur);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fournisseur $fournisseur)
    {
        $this->authorize('delete', $fournisseur);

        $fournisseur->delete();

        return response()->noContent();
    }
}
