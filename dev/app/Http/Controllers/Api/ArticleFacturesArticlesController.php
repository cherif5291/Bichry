<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FacturesArticleResource;
use App\Http\Resources\FacturesArticleCollection;

class ArticleFacturesArticlesController extends Controller
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

        $facturesArticles = $article
            ->facturesArticles()
            ->search($search)
            ->latest()
            ->paginate();

        return new FacturesArticleCollection($facturesArticles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', FacturesArticle::class);

        $validated = $request->validate([
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
            'taxe_id' => 'required|exists:taxes,id',
        ]);

        $facturesArticle = $article->facturesArticles()->create($validated);

        return new FacturesArticleResource($facturesArticle);
    }
}
