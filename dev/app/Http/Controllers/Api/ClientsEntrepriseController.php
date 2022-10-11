<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsEntrepriseResource;
use App\Http\Resources\ClientsEntrepriseCollection;
use App\Http\Requests\ClientsEntrepriseStoreRequest;
use App\Http\Requests\ClientsEntrepriseUpdateRequest;

class ClientsEntrepriseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ClientsEntreprise::class);

        $search = $request->get('search', '');

        $clientsEntreprises = ClientsEntreprise::search($search)
            ->latest()
            ->paginate();

        return new ClientsEntrepriseCollection($clientsEntreprises);
    }

    /**
     * @param \App\Http\Requests\ClientsEntrepriseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsEntrepriseStoreRequest $request)
    {
        $this->authorize('create', ClientsEntreprise::class);

        $validated = $request->validated();

        $clientsEntreprise = ClientsEntreprise::create($validated);

        return new ClientsEntrepriseResource($clientsEntreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ClientsEntreprise $clientsEntreprise)
    {
        $this->authorize('view', $clientsEntreprise);

        return new ClientsEntrepriseResource($clientsEntreprise);
    }

    /**
     * @param \App\Http\Requests\ClientsEntrepriseUpdateRequest $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function update(
        ClientsEntrepriseUpdateRequest $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('update', $clientsEntreprise);

        $validated = $request->validated();

        $clientsEntreprise->update($validated);

        return new ClientsEntrepriseResource($clientsEntreprise);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('delete', $clientsEntreprise);

        $clientsEntreprise->delete();

        return response()->noContent();
    }
}
