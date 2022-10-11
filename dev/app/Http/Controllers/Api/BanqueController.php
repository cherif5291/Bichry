<?php

namespace App\Http\Controllers\Api;

use App\Models\Banque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BanqueResource;
use App\Http\Resources\BanqueCollection;
use App\Http\Requests\BanqueStoreRequest;
use App\Http\Requests\BanqueUpdateRequest;

class BanqueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Banque::class);

        $search = $request->get('search', '');

        $banques = Banque::search($search)
            ->latest()
            ->paginate();

        return new BanqueCollection($banques);
    }

    /**
     * @param \App\Http\Requests\BanqueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BanqueStoreRequest $request)
    {
        $this->authorize('create', Banque::class);

        $validated = $request->validated();

        $banque = Banque::create($validated);

        return new BanqueResource($banque);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Banque $banque)
    {
        $this->authorize('view', $banque);

        return new BanqueResource($banque);
    }

    /**
     * @param \App\Http\Requests\BanqueUpdateRequest $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function update(BanqueUpdateRequest $request, Banque $banque)
    {
        $this->authorize('update', $banque);

        $validated = $request->validated();

        $banque->update($validated);

        return new BanqueResource($banque);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banque $banque)
    {
        $this->authorize('delete', $banque);

        $banque->delete();

        return response()->noContent();
    }
}
