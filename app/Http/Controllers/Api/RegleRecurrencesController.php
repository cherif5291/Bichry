<?php

namespace App\Http\Controllers\Api;

use App\Models\Regle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecurrenceResource;
use App\Http\Resources\RecurrenceCollection;

class RegleRecurrencesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Regle $regle)
    {
        $this->authorize('view', $regle);

        $search = $request->get('search', '');

        $recurrences = $regle
            ->recurrences()
            ->search($search)
            ->latest()
            ->paginate();

        return new RecurrenceCollection($recurrences);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Regle $regle
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Regle $regle)
    {
        $this->authorize('create', Recurrence::class);

        $validated = $request->validate([
            'facture_id' => 'nullable|exists:factures,id',
            'paie_id' => 'nullable|exists:paies,id',
            'interval_jour' => 'required|numeric',
            'prochain_date' => 'required|date',
        ]);

        $recurrence = $regle->recurrences()->create($validated);

        return new RecurrenceResource($recurrence);
    }
}
