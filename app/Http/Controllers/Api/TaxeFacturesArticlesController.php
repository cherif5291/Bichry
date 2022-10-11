<?php

namespace App\Http\Controllers\Api;

use App\Models\Taxe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FacturesArticleResource;
use App\Http\Resources\FacturesArticleCollection;

class TaxeFacturesArticlesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Taxe $taxe)
    {
        $this->authorize('view', $taxe);

        $search = $request->get('search', '');

        $facturesArticles = $taxe
            ->facturesArticles()
            ->search($search)
            ->latest()
            ->paginate();

        return new FacturesArticleCollection($facturesArticles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Taxe $taxe)
    {
        $this->authorize('create', FacturesArticle::class);

        $validated = $request->validate([
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $facturesArticle = $taxe->facturesArticles()->create($validated);

        return new FacturesArticleResource($facturesArticle);
    }
}
