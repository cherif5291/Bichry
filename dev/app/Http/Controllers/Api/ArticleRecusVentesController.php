<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecusVenteResource;
use App\Http\Resources\RecusVenteCollection;

class ArticleRecusVentesController extends Controller
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

        $recusVentes = $article
            ->recusVentes()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecusVenteCollection($recusVentes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', RecusVente::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_livraison' => 'required|max:255|string',
            'date_recu_vente' => 'required|date',
            'reference' => 'required|max:255',
            'numero_recu' => 'required|max:255',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'message_recu' => 'required|max:255|string',
            'message_releve' => 'required|max:255|string',
            'depose_sur' => 'required|max:255|string',
            'caisse_id' => 'nullable|exists:caisses,id',
            'banque_id' => 'nullable|exists:banques,id',
            'montant' => 'required|numeric',
        ]);

        $recusVente = $article->recusVentes()->create($validated);

        return new RecusVenteResource($recusVente);
    }
}
