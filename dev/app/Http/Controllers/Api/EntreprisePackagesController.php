<?php

namespace App\Http\Controllers\Api;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Http\Resources\PackageCollection;

class EntreprisePackagesController extends Controller
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

        $packages = $entreprise
            ->packages()
            ->search($search)
            ->latest()
            ->paginate();

        return new PackageCollection($packages);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Entreprise $entreprise
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Entreprise $entreprise)
    {
        $this->authorize('create', Package::class);

        $validated = $request->validate([]);

        $package = $entreprise->packages()->create($validated);

        return new PackageResource($package);
    }
}
