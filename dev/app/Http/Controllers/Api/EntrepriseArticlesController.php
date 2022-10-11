<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;

class EntrepriseArticlesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $articles = $entreprise
            ->articles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArticleCollection($articles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Article::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
            'description' => 'nullable|max:255|string',
            'prix_unitaire' => 'required|numeric',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $article = $entreprise->articles()->create($validated);

        return new ArticleResource($article);
    }
}
