<?php

namespace App\Http\Controllers\Api;

use App\Models\Langue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LangueResource;
use App\Http\Resources\LangueCollection;
use App\Http\Requests\LangueStoreRequest;
use App\Http\Requests\LangueUpdateRequest;

class LangueController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Langue::class);

        $search = $request->get('search', '');

        $langues = Langue::search($search)
            ->latest()
            ->paginate();

        return new LangueCollection($langues);
    }

    /**
     * @param \App\Http\Requests\LangueStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LangueStoreRequest $request)
    {
        $this->authorize('create', Langue::class);

        $validated = $request->validated();

        $langue = Langue::create($validated);

        return new LangueResource($langue);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Langue $langue)
    {
        $this->authorize('view', $langue);

        return new LangueResource($langue);
    }

    /**
     * @param \App\Http\Requests\LangueUpdateRequest $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function update(LangueUpdateRequest $request, Langue $langue)
    {
        $this->authorize('update', $langue);

        $validated = $request->validated();

        $langue->update($validated);

        return new LangueResource($langue);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Langue $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Langue $langue)
    {
        $this->authorize('delete', $langue);

        $langue->delete();

        return response()->noContent();
    }
}
