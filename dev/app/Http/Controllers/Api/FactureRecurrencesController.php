<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecurrenceResource;
use App\Http\Resources\RecurrenceCollection;

class FactureRecurrencesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Facture $facture)
    {
        $this->authorize('view', $facture);

        $search = $request->get('search', '');

        $recurrences = $facture
            ->recurrences()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecurrenceCollection($recurrences);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Facture $facture)
    {
        $this->authorize('create', Recurrence::class);

        $validated = $request->validate([
            'paie_id' => 'nullable|exists:paies,id',
            'interval_jour' => 'required|numeric',
            'prochain_date' => 'required|date',
            'regle_id' => 'required|exists:regles,id',
        ]);

        $recurrence = $facture->recurrences()->create($validated);

        return new RecurrenceResource($recurrence);
    }
}
