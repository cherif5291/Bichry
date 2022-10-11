<?php

namespace App\Http\Controllers\Api;

use App\Models\Paie;
use Illuminate\Http\Request;
use App\Http\Resources\PaieResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaieCollection;
use App\Http\Requests\PaieStoreRequest;
use App\Http\Requests\PaieUpdateRequest;

class PaieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Paie::class);

        $search = $request->get('search', '');

        $paies = Paie::search($search)
            ->latest()
            ->paginate();

        return new PaieCollection($paies);
    }

    /**
     * @param \App\Http\Requests\PaieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaieStoreRequest $request)
    {
        $this->authorize('create', Paie::class);

        $validated = $request->validated();

        $paie = Paie::create($validated);

        return new PaieResource($paie);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Paie $paie)
    {
        $this->authorize('view', $paie);

        return new PaieResource($paie);
    }

    /**
     * @param \App\Http\Requests\PaieUpdateRequest $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function update(PaieUpdateRequest $request, Paie $paie)
    {
        $this->authorize('update', $paie);

        $validated = $request->validated();

        $paie->update($validated);

        return new PaieResource($paie);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Paie $paie)
    {
        $this->authorize('delete', $paie);

        $paie->delete();

        return response()->noContent();
    }
}
