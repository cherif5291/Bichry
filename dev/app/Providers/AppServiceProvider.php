<?php

namespace App\Providers;

use App\Models\Abonnement;
use App\Models\ClientsEntreprise;
use App\Models\Entreprise;
use App\Models\Module;
use App\Models\ModulePack;
use App\Models\Package;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // if (Auth::user()) {
            $Abonnement = Abonnement::all();
            $Packages = Package::all();
            $ModulePack = ModulePack::all();
            $AllModules = Module::all();
            $Clients = ClientsEntreprise::all();

            view()->share(['Clients' => $Clients,'Abonnement' => $Abonnement, 'Packages' => $Packages, 'ModulePack' => $ModulePack, 'AllModules' => $AllModules,]);
        // }


    }
}
