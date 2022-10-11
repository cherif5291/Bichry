<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\FacturesArticle;
use App\Http\Controllers\Controller;
use App\Http\Resources\FacturesArticleResource;
use App\Http\Resources\FacturesArticleCollection;
use App\Http\Requests\FacturesArticleStoreRequest;
use App\Http\Requests\FacturesArticleUpdateRequest;

class FacturesArticleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', FacturesArticle::class);

        $search = $request->get('search', '');

        $facturesArticles = FacturesArticle::search($search)
            ->latest()
            ->paginate();

        return new FacturesArticleCollection($facturesArticles);
    }

    /**
     * @param \App\Http\Requests\FacturesArticleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturesArticleStoreRequest $request)
    {
        $this->authorize('create', FacturesArticle::class);

        $validated = $request->validated();

        $facturesArticle = FacturesArticle::create($validated);

        return new FacturesArticleResource($facturesArticle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('view', $facturesArticle);

        return new FacturesArticleResource($facturesArticle);
    }

    /**
     * @param \App\Http\Requests\FacturesArticleUpdateRequest $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function update(
        FacturesArticleUpdateRequest $request,
        FacturesArticle $facturesArticle
    ) {
        $this->authorize('update', $facturesArticle);

        $validated = $request->validated();

        $facturesArticle->update($validated);

        return new FacturesArticleResource($facturesArticle);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('delete', $facturesArticle);

        $facturesArticle->delete();

        return response()->noContent();
    }
}
