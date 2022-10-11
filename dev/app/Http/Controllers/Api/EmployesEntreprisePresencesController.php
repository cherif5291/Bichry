<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\PresenceResource;
use App\Http\Resources\PresenceCollection;

class EmployesEntreprisePresencesController extends Controller
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

        $presences = $employesEntreprise
            ->presences()
            ->search($search)
            ->latest()
            ->paginate();

        return new PresenceCollection($presences);
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
        $this->authorize('create', Presence::class);

        $validated = $request->validate([
            'date' => 'required|date',
            'heure_arrive' => 'nullable|date_format:H:i:s',
            'heure_depard' => 'nullable|date_format:H:i:s',
            'temps_absence' => 'nullable|numeric',
            'est_present' => 'required|max:255|string',
        ]);

        $presence = $employesEntreprise->presences()->create($validated);

        return new PresenceResource($presence);
    }
}
