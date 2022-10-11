<?php

namespace App\Http\Controllers\Api;

use App\Models\Recurrence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecurrenceResource;
use App\Http\Resources\RecurrenceCollection;
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
            ->paginate();

        return new RecurrenceCollection($recurrences);
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

        return new RecurrenceResource($recurrence);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recurrence $recurrence
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Recurrence $recurrence)
    {
        $this->authorize('view', $recurrence);

        return new RecurrenceResource($recurrence);
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

        return new RecurrenceResource($recurrence);
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

        return response()->noContent();
    }
}
