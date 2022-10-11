<?php

namespace App\Http\Controllers\Api;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RuptureResource;
use App\Http\Resources\RuptureCollection;

class InvitationRupturesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        $search = $request->get('search', '');

        $ruptures = $invitation
            ->ruptures()
            ->search($search)
            ->latest()
            ->paginate();

        return new RuptureCollection($ruptures);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invitation $invitation)
    {
        $this->authorize('create', Rupture::class);

        $validated = $request->validate([
            'entreprise_id' => 'required|exists:entreprises,id',
            'status' => 'nullable|max:255|string',
        ]);

        $rupture = $invitation->ruptures()->create($validated);

        return new RuptureResource($rupture);
    }
}
