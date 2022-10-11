<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\FacturesArticle;
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
            ->paginate(5);

        return view(
            'app.factures_articles.index',
            compact('facturesArticles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', FacturesArticle::class);

        $articles = Article::pluck('nom', 'id');
        $taxes = Taxe::pluck('nom', 'id');

        return view(
            'app.factures_articles.create',
            compact('articles', 'taxes')
        );
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

        return redirect()
            ->route('factures-articles.edit', $facturesArticle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('view', $facturesArticle);

        return view('app.factures_articles.show', compact('facturesArticle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FacturesArticle $facturesArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FacturesArticle $facturesArticle)
    {
        $this->authorize('update', $facturesArticle);

        $articles = Article::pluck('nom', 'id');
        $taxes = Taxe::pluck('nom', 'id');

        return view(
            'app.factures_articles.edit',
            compact('facturesArticle', 'articles', 'taxes')
        );
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

        return redirect()
            ->route('factures-articles.edit', $facturesArticle)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('factures-articles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
