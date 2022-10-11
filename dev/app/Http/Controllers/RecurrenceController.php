<?php

namespace App\Http\Controllers;

use App\Models\Paie;
use App\Models\Regle;
use App\Models\Facture;
use App\Models\Recurrence;
use Illuminate\Http\Request;
use App\Http\Requests\RecurrenceStoreRequest;
use App\Http\Requests\RecurrenceUpdateRequest;

class RecurrenceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Recurrence::class);

        $search = $request->get('search', '');

        $recurrences = Recurrence::search($search)
            ->latest()
            ->paginate(5);

        return view('app.recurrences.index', compact('recurrences', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Recurrence::class);

        $factures = Facture::pluck('cc_cci', 'id');
        $paies = Paie::pluck('date', 'id');
        $regles = Regle::pluck('motif', 'id');

        return view(
            'app.recurrences.create',
            compact('factures', 'paies', 'regles')
        );
    }

    /**
     * @param \App\Http\Requests\RecurrenceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecurrenceStoreRequest $request)
    {
        $this->authorize('create', Recurrence::class);

        $validated = $request->validated();

        $recurrence = Recurrence::create($validated);

        return redirect()
            ->route('recurrences.edit', $recurrence)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recurrence $recurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recurrence $recurrence)
    {
        $this->authorize('view', $recurrence);

        return view('app.recurrences.show', compact('recurrence'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recurrence $recurrence
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Recurrence $recurrence)
    {
        $this->authorize('update', $recurrence);

        $factures = Facture::pluck('cc_cci', 'id');
        $paies = Paie::pluck('date', 'id');
        $regles = Regle::pluck('motif', 'id');

        return view(
            'app.recurrences.edit',
            compact('recurrence', 'factures', 'paies', 'regles')
        );
    }

    /**
     * @param \App\Http\Requests\RecurrenceUpdateRequest $request
     * @param \App\Models\Recurrence $recurrence
     * @return \Illuminate\Http\Response
     */
    public function update(
        RecurrenceUpdateRequest $request,
        Recurrence $recurrence
    ) {
        $this->authorize('update', $recurrence);

        $validated = $request->validated();

        $recurrence->update($validated);

        return redirect()
            ->route('recurrences.edit', $recurrence)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recurrence $recurrence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Recurrence $recurrence)
    {
        $this->authorize('delete', $recurrence);

        $recurrence->delete();

        return redirect()
            ->route('recurrences.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
