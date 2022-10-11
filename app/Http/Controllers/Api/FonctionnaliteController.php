<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Fonctionnalite;
use App\Http\Controllers\Controller;
use App\Http\Resources\FonctionnaliteResource;
use App\Http\Resources\FonctionnaliteCollection;
use App\Http\Requests\FonctionnaliteStoreRequest;
use App\Http\Requests\FonctionnaliteUpdateRequest;

class FonctionnaliteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Fonctionnalite::class);

        $search = $request->get('search', '');

        $fonctionnalites = Fonctionnalite::search($search)
            ->latest()
            ->paginate();

        return new FonctionnaliteCollection($fonctionnalites);
    }

    /**
     * @param \App\Http\Requests\FonctionnaliteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FonctionnaliteStoreRequest $request)
    {
        $this->authorize('create', Fonctionnalite::class);

        $validated = $request->validated();

        $fonctionnalite = Fonctionnalite::create($validated);

        return new FonctionnaliteResource($fonctionnalite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('view', $fonctionnalite);

        return new FonctionnaliteResource($fonctionnalite);
    }

    /**
     * @param \App\Http\Requests\FonctionnaliteUpdateRequest $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function update(
        FonctionnaliteUpdateRequest $request,
        Fonctionnalite $fonctionnalite
    ) {
        $this->authorize('update', $fonctionnalite);

        $validated = $request->validated();

        $fonctionnalite->update($validated);

        return new FonctionnaliteResource($fonctionnalite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Fonctionnalite $fonctionnalite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fonctionnalite $fonctionnalite)
    {
        $this->authorize('delete', $fonctionnalite);

        $fonctionnalite->delete();

        return response()->noContent();
    }
}
