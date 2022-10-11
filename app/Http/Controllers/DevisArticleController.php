<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use App\Models\Devis;
use App\Models\Article;
use App\Models\DevisArticle;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view(
            'app.devis_articles.index',
            compact('devisArticles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DevisArticle::class);

        $allDevis = Devis::pluck('cc_cci', 'id');
        $taxes = Taxe::pluck('nom', 'id');
        $articles = Article::pluck('nom', 'id');

        return view(
            'app.devis_articles.create',
            compact('allDevis', 'taxes', 'articles')
        );
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

        return redirect()
            ->route('devis-articles.edit', $devisArticle)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisArticle $devisArticle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DevisArticle $devisArticle)
    {
        $this->authorize('view', $devisArticle);

        return view('app.devis_articles.show', compact('devisArticle'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisArticle $devisArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DevisArticle $devisArticle)
    {
        $this->authorize('update', $devisArticle);

        $allDevis = Devis::pluck('cc_cci', 'id');
        $taxes = Taxe::pluck('nom', 'id');
        $articles = Article::pluck('nom', 'id');

        return view(
            'app.devis_articles.edit',
            compact('devisArticle', 'allDevis', 'taxes', 'articles')
        );
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

        return redirect()
            ->route('devis-articles.edit', $devisArticle)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('devis-articles.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
