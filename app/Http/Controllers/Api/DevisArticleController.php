<?php

namespace App\Http\Controllers\Api;

use App\Models\DevisArticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisArticleResource;
use App\Http\Resources\DevisArticleCollection;
use App\Http\Requests\DevisArticleStoreRequest;
use App\Http\Requests\DevisArticleUpdateRequest;

class DevisArticleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DevisArticle::class);

        $search = $request->get('search', '');

        $devisArticles = DevisArticle::search($search)
            ->latest()
            ->paginate();

        return new DevisArticleCollection($devisArticles);
    }

    /**
     * @param \App\Http\Requests\DevisArticleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevisArticleStoreRequest $request)
    {
        $this->authorize('create', DevisArticle::class);

        $validated = $request->validated();

        $devisArticle = DevisArticle::create($validated);

        return new DevisArticleResource($devisArticle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisArticle $devisArticle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DevisArticle $devisArticle)
    {
        $this->authorize('view', $devisArticle);

        return new DevisArticleResource($devisArticle);
    }

    /**
     * @param \App\Http\Requests\DevisArticleUpdateRequest $request
     * @param \App\Models\DevisArticle $devisArticle
     * @return \Illuminate\Http\Response
     */
    public function update(
        DevisArticleUpdateRequest $request,
        DevisArticle $devisArticle
    ) {
        $this->authorize('update', $devisArticle);

        $validated = $request->validated();

        $devisArticle->update($validated);

        return new DevisArticleResource($devisArticle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisArticle $devisArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DevisArticle $devisArticle)
    {
        $this->authorize('delete', $devisArticle);

        $devisArticle->delete();

        return response()->noContent();
    }
}
