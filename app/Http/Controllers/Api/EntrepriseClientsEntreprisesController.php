<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsEntrepriseResource;
use App\Http\Resources\ClientsEntrepriseCollection;

class EntrepriseClientsEntreprisesController extends Controller
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

        $clientsEntreprises = $entreprise
            ->clientsEntreprises()
            ->search($search)
            ->latest()
            ->paginate();

        return new ClientsEntrepriseCollection($clientsEntreprises);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', ClientsEntreprise::class);

        $validated = $request->validate([
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
            'devises_monetaire_id' => 'nullable|exists:devises_monetaires,id',
            'logo' => 'nullable|max:255|string',
        ]);

        $clientsEntreprise = $entreprise
            ->clientsEntreprises()
            ->create($validated);

        return new ClientsEntrepriseResource($clientsEntreprise);
    }
}
