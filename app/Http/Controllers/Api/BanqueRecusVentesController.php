<?php

namespace App\Http\Controllers\Api;

use App\Models\Banque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecusVenteResource;
use App\Http\Resources\RecusVenteCollection;

class BanqueRecusVentesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Banque $banque)
    {
        $this->authorize('view', $banque);

        $search = $request->get('search', '');

        $recusVentes = $banque
            ->recusVentes()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecusVenteCollection($recusVentes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banque $banque
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Banque $banque)
    {
        $this->authorize('create', RecusVente::class);

        $validated = $request->validate([
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_livraison' => 'required|max:255|string',
            'date_recu_vente' => 'required|date',
            'reference' => 'required|max:255',
            'numero_recu' => 'required|max:255',
            'article_id' => 'required|exists:articles,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'message_recu' => 'required|max:255|string',
            'message_releve' => 'required|max:255|string',
            'depose_sur' => 'required|max:255|string',
            'caisse_id' => 'nullable|exists:caisses,id',
            'montant' => 'required|numeric',
        ]);

        $recusVente = $banque->recusVentes()->create($validated);

        return new RecusVenteResource($recusVente);
    }
}
