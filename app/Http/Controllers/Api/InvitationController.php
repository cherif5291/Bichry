<?php

namespace App\Http\Controllers\Api;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvitationResource;
use App\Http\Resources\InvitationCollection;
use App\Http\Requests\InvitationStoreRequest;
use App\Http\Requests\InvitationUpdateRequest;

class InvitationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Invitation::class);

        $search = $request->get('search', '');

        $invitations = Invitation::search($search)
            ->latest()
            ->paginate();

        return new InvitationCollection($invitations);
    }

    /**
     * @param \App\Http\Requests\InvitationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationStoreRequest $request)
    {
        $this->authorize('create', Invitation::class);

        $validated = $request->validated();

        $invitation = Invitation::create($validated);

        return new InvitationResource($invitation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        return new InvitationResource($invitation);
    }

    /**
     * @param \App\Http\Requests\InvitationUpdateRequest $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(
        InvitationUpdateRequest $request,
        Invitation $invitation
    ) {
        $this->authorize('update', $invitation);

        $validated = $request->validated();

        $invitation->update($validated);

        return new InvitationResource($invitation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Invitation $invitation)
    {
        $this->authorize('delete', $invitation);

        $invitation->delete();

        return response()->noContent();
    }
}
