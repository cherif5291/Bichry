<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisArticleResource;
use App\Http\Resources\DevisArticleCollection;

class ArticleDevisArticlesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Article $article)
    {
        $this->authorize('view', $article);

        $search = $request->get('search', '');

        $devisArticles = $article
            ->devisArticles()
            ->search($search)
            ->latest()
            ->paginate();

        return new DevisArticleCollection($devisArticles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', DevisArticle::class);

        $validated = $request->validate([
            'devis_id' => 'required|exists:devis,id',
            'taxe_id' => 'required|exists:taxes,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $devisArticle = $article->devisArticles()->create($validated);

        return new DevisArticleResource($devisArticle);
    }
}
