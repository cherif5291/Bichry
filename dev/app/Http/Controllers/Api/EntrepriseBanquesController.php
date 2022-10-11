<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BanqueResource;
use App\Http\Resources\BanqueCollection;

class EntrepriseBanquesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Entreprise $entreprise)
    {
        $this->authorize('view', $entreprise);

        $search = $request->get('search', '');

        $banques = $entreprise
            ->banques()
            ->search($search)
            ->latest()
            ->paginate();

        return new BanqueCollection($banques);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Banque::class);

        $validated = $request->validate([
            'nom' => 'required|max:255|string',
            'numero_compte' => 'required|max:255|string',
            'logo_banque' => 'nullable|max:255|string',
        ]);

        $banque = $entreprise->banques()->create($validated);

        return new BanqueResource($banque);
    }
}
