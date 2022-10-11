<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DevisesMonetaire;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisesMonetaireResource;
use App\Http\Resources\DevisesMonetaireCollection;
use App\Http\Requests\DevisesMonetaireStoreRequest;
use App\Http\Requests\DevisesMonetaireUpdateRequest;

class DevisesMonetaireController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DevisesMonetaire::class);

        $search = $request->get('search', '');

        $devisesMonetaires = DevisesMonetaire::search($search)
            ->latest()
            ->paginate();

        return new DevisesMonetaireCollection($devisesMonetaires);
    }

    /**
     * @param \App\Http\Requests\DevisesMonetaireStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisesMonetaireStoreRequest $request)
    {
        $this->authorize('create', DevisesMonetaire::class);

        $validated = $request->validated();

        $devisesMonetaire = DevisesMonetaire::create($validated);

        return new DevisesMonetaireResource($devisesMonetaire);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DevisesMonetaire $devisesMonetaire)
    {
        $this->authorize('view', $devisesMonetaire);

        return new DevisesMonetaireResource($devisesMonetaire);
    }

    /**
     * @param \App\Http\Requests\DevisesMonetaireUpdateRequest $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function update(
        DevisesMonetaireUpdateRequest $request,
        DevisesMonetaire $devisesMonetaire
    ) {
        $this->authorize('update', $devisesMonetaire);

        $validated = $request->validated();

        $devisesMonetaire->update($validated);

        return new DevisesMonetaireResource($devisesMonetaire);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        DevisesMonetaire $devisesMonetaire
    ) {
        $this->authorize('delete', $devisesMonetaire);

        $devisesMonetaire->delete();

        return response()->noContent();
    }
}
