<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployesEntrepriseResource;
use App\Http\Resources\EmployesEntrepriseCollection;

class EntrepriseEmployesEntreprisesController extends Controller
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

        $employesEntreprises = $entreprise
            ->employesEntreprises()
            ->search($search)
            ->latest()
            ->paginate();

        return new EmployesEntrepriseCollection($employesEntreprises);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', EmployesEntreprise::class);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'prenom' => 'required|max:255|string',
            'nom' => 'required|max:255|string',
            'initial' => 'required|max:255|string',
            'email' => 'required|email',
            'telephone' => 'required|max:255|string',
            'data_embauche' => 'required|date',
            'interval_paiement' => 'required|max:255|string',
            'duree_interval' => 'required|numeric',
            'remuneration' => 'required|numeric',
        ]);

        $employesEntreprise = $entreprise
            ->employesEntreprises()
            ->create($validated);

        return new EmployesEntrepriseResource($employesEntreprise);
    }
}
