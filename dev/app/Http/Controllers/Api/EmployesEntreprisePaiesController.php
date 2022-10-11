<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Resources\PaieResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaieCollection;

class EmployesEntreprisePaiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function index(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('view', $employesEntreprise);

        $search = $request->get('search', '');

        $paies = $employesEntreprise
            ->paies()
            ->search($search)
            ->latest()
            ->paginate();

        return new PaieCollection($paies);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('create', Paie::class);

        $validated = $request->validate([
            'date' => 'nullable|date',
            'montant_paye' => 'required|numeric',
            'restant' => 'nullable|numeric',
        ]);

        $paie = $employesEntreprise->paies()->create($validated);

        return new PaieResource($paie);
    }
}
