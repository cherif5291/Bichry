<?php

namespace App\Http\Controllers\Api;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DevisArticleResource;
use App\Http\Resources\DevisArticleCollection;

class DevisDevisArticlesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Devis $devis)
    {
        $this->authorize('view', $devis);

        $search = $request->get('search', '');

        $devisArticles = $devis
            ->devisArticles()
            ->search($search)
            ->latest()
            ->paginate();

        return new DevisArticleCollection($devisArticles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devis $devis
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Devis $devis)
    {
        $this->authorize('create', DevisArticle::class);

        $validated = $request->validate([
            'taxe_id' => 'required|exists:taxes,id',
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $devisArticle = $devis->devisArticles()->create($validated);

        return new DevisArticleResource($devisArticle);
    }
}
