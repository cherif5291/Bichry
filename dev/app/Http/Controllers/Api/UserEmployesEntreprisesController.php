<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployesEntrepriseResource;
use App\Http\Resources\EmployesEntrepriseCollection;

class UserEmployesEntreprisesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $employesEntreprises = $user
            ->employesEntreprises()
            ->search($search)
            ->latest()
            ->paginate();

        return new EmployesEntrepriseCollection($employesEntreprises);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', EmployesEntreprise::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
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

        $employesEntreprise = $user->employesEntreprises()->create($validated);

        return new EmployesEntrepriseResource($employesEntreprise);
    }
}
