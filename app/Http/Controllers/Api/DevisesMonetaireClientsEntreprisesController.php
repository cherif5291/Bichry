<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DevisesMonetaire;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsEntrepriseResource;
use App\Http\Resources\ClientsEntrepriseCollection;

class DevisesMonetaireClientsEntreprisesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, DevisesMonetaire $devisesMonetaire)
    {
        $this->authorize('view', $devisesMonetaire);

        $search = $request->get('search', '');

        $clientsEntreprises = $devisesMonetaire
            ->clientsEntreprises()
            ->search($search)
            ->latest()
            ->paginate();

        return new ClientsEntrepriseCollection($clientsEntreprises);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DevisesMonetaire $devisesMonetaire
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DevisesMonetaire $devisesMonetaire)
    {
        $this->authorize('create', ClientsEntreprise::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'nom' => 'required|max:255|string',
            'prenom' => 'required|max:255|string',
            'entreprise' => 'required|max:255|string',
            'email' => 'nullable|email',
            'telephone' => 'required|max:255|string',

            'titre' => 'nullable|max:255|string',

            'adresse' => 'required|max:255|string',
            'ville' => 'required|max:255|string',
            'province' => 'nullable|max:255|string',
            'code_postale' => 'nullable|max:255|string',
            'pays' => 'required|max:255|string',
            'note' => 'nullable|max:255|string',
            'paiements_mode_id' => 'nullable|exists:paiements_modes,id',
            'paiements_modalite_id' => 'nullable|exists:paiements_modalites,id',
            'logo' => 'nullable|max:255|string',
        ]);

        $clientsEntreprise = $devisesMonetaire
            ->clientsEntreprises()
            ->create($validated);

        return new ClientsEntrepriseResource($clientsEntreprise);
    }
}
