<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecusVenteResource;
use App\Http\Resources\RecusVenteCollection;

class ClientsEntrepriseRecusVentesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('view', $clientsEntreprise);

        $search = $request->get('search', '');

        $recusVentes = $clientsEntreprise
            ->recusVentes()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecusVenteCollection($recusVentes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('create', RecusVente::class);

        $validated = $request->validate([
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
            'banque_id' => 'nullable|exists:banques,id',
            'montant' => 'required|numeric',
        ]);

        $recusVente = $clientsEntreprise->recusVentes()->create($validated);

        return new RecusVenteResource($recusVente);
    }
}
