<?php

namespace App\Http\Controllers\Api;

use App\Models\Taxe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisArticleResource;
use App\Http\Resources\DevisArticleCollection;

class TaxeDevisArticlesController extends Controller
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

        $devisArticles = $taxe
            ->devisArticles()
            ->search($search)
            ->latest()
            ->paginate();

        return new DevisArticleCollection($devisArticles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Taxe $taxe
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Taxe $taxe)
    {
        $this->authorize('create', DevisArticle::class);

        $validated = $request->validate([
            'devis_id' => 'required|exists:devis,id',
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $devisArticle = $taxe->devisArticles()->create($validated);

        return new DevisArticleResource($devisArticle);
    }
}
