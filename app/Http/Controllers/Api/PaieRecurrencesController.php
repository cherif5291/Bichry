<?php

namespace App\Http\Controllers\Api;

use App\Models\Paie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecurrenceResource;
use App\Http\Resources\RecurrenceCollection;

class PaieRecurrencesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Paie $paie)
    {
        $this->authorize('view', $paie);

        $search = $request->get('search', '');

        $recurrences = $paie
            ->recurrences()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecurrenceCollection($recurrences);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Paie $paie
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paie $paie)
    {
        $this->authorize('create', Recurrence::class);

        $validated = $request->validate([
            'facture_id' => 'nullable|exists:factures,id',
            'interval_jour' => 'required|numeric',
            'prochain_date' => 'required|date',
            'regle_id' => 'required|exists:regles,id',
        ]);

        $recurrence = $paie->recurrences()->create($validated);

        return new RecurrenceResource($recurrence);
    }
}
