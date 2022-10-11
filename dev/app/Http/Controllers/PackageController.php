<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\PackageStoreRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Models\InfosSystem;
use App\Models\Module;
use App\Models\ModulePack;

class PackageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Package::class);

        $search = $request->get('search', '');

        $packages = Package::search($search)
            ->latest()
            ->paginate(5);

        return view('app.packages.index', compact('packages', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $InfosSystem = InfosSystem::find(1);
        $Packages =  Package::all();
        $PageName = "Parametres application";
        $ModulePack = ModulePack::all();
        $Is_selected = 3;
       return view('admin.parametres.packages.add', compact('InfosSystem', 'PageName', 'Packages', 'Is_selected', 'ModulePack'));
    }

    /**
     * @param \App\Http\Requests\PackageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'type'=>'required',
            'prix'=>'required',
            'description'=>'nullable',
            'stripe_id',

        ]);
        $Package = new Package();
        $Package->type=$request->input('type');
        $Package->prix=$request->input('prix');
        $Package->nom=$request->input('nom');
        $Package->stripe_id=$request->input('stripe_id');
        $Package->description=$request->input('description');
        $Package->save();
        return back()->with('success', "Abonnment ajoutée avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $InfosSystem = InfosSystem::find(1);
        $Packages =  Package::all();
        $Package =  Package::find($id);
        $Modules = Module::all();
        $PageName = "Détails de l'abonnement du package";
        $Is_selected = 3;
        $ModulePack = ModulePack::all();
        return view('admin.parametres.packages.show', compact('InfosSystem', 'PageName', 'Packages', 'Package', 'Is_selected', 'Modules', 'ModulePack'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $InfosSystem = InfosSystem::find(1);
        $Packages =  Package::all();
        $Package =  Package::find($id);
        $PageName = "Parametres application";
        $Is_selected = 3;
        $ModulePack = ModulePack::all();

        return view('admin.parametres.packages.edit', compact('InfosSystem', 'PageName', 'Packages', 'Package', 'Is_selected', 'ModulePack'));
    }

    /**
     * @param \App\Http\Requests\PackageUpdateRequest $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'required',
            'type'=>'required',
            'prix'=>'required',
            'description'=>'nullable',
            'stripe_id',

        ]);
        $Package =  Package::find($id);
        $Package->type=$request->input('type');
        $Package->prix=$request->input('prix');
        $Package->nom=$request->input('nom');
        $Package->stripe_id=$request->input('stripe_id');
        $Package->description=$request->input('description');
        $Package->update();
        return back()->with('success', "Abonnment mise à jour avec succès !");
    }

    public function modules(Request $request, $id)
    {

        $this->validate($request, [

            'clients'=>'nullable',
            'fournisseurs'=>'nullable',
            'produits_services'=>'nullable',
            'factures'=>'nullable',
            'devis'=>'nullable',
            'depenses'=>'nullable',
            'employes'=>'nullable',
            'paie'=>'nullable',
            'banques_caisses'=>'nullable',
            'contrats'=>'nullable',
            'rapports'=>'nullable',
            'activites'=>'nullable',
            'cabinet'=>'nullable',
            'omptable'=>'nullable',
            'reglement'=>'nullable',
            'acceptation_paiement'=>'nullable',
            'regle'=>'nullable',
            'recurence'=>'nullable',
            'utilisateurs'=>'nullable',
            'infos_entreprise'=>'nullable',
            'abonnements'=>'nullable',
            'habilitations'=>'nullable',



        ]);
        if ($request->input('clients') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 1)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 1;
                $Config->save();
            }
        }elseif ($request->input('clients') == 0 OR !$request->input('clients')  OR $request->input('clients') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 1)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 1)->first()->delete();
            }
        }

        if ($request->input('fournisseurs') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 2)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 2;
                $Config->save();
            }
        }elseif ($request->input('fournisseurs') == 0 OR !$request->input('fournisseurs')  OR $request->input('fournisseurs') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 2)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 2)->first()->delete();
            }
        }

        if ($request->input('produits_services') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 3)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 3;
                $Config->save();
            }
        }elseif ($request->input('produits_services') == 0 OR !$request->input('produits_services')  OR $request->input('clients') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 3)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 3)->first()->delete();
            }
        }

        if ($request->input('factures') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 4)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 4;
                $Config->save();
            }
        }elseif ($request->input('factures') == 0 OR !$request->input('factures')  OR $request->input('factures') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 4)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 4)->first()->delete();
            }
        }

        if ($request->input('devis') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 5)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 5;
                $Config->save();
            }
        }elseif ($request->input('devis') == 0 OR !$request->input('devis')  OR $request->input('devis') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 5)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 5)->first()->delete();
            }
        }

        if ($request->input('depenses') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 6)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 6;
                $Config->save();
            }
        }elseif ($request->input('depenses') == 0 OR !$request->input('depenses')  OR $request->input('depenses') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 6)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 6)->first()->delete();
            }
        }



        if ($request->input('employes') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 7)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 7;
                $Config->save();
            }
        }elseif ($request->input('employes') == 0 OR !$request->input('employes')  OR $request->input('employes') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 7)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 7)->first()->delete();
            }
        }

        if ($request->input('paie') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 8)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 8;
                $Config->save();
            }
        }elseif ($request->input('paie') == 0 OR !$request->input('paie')  OR $request->input('paie') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 8)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 8)->first()->delete();
            }
        }

        if ($request->input('banques_caisses') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 9)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 9;
                $Config->save();
            }
        }elseif ($request->input('banques_caisses') == 0 OR !$request->input('banques_caisses')  OR $request->input('banques_caisses') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 9)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 9)->first()->delete();
            }
        }

        if ($request->input('contrats') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 10)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 10;
                $Config->save();
            }
        }elseif ($request->input('contrats') == 0 OR !$request->input('contrats')  OR $request->input('contrats') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 10)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 10)->first()->delete();
            }
        }

        if ($request->input('rapports') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 11)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 11;
                $Config->save();
            }
        }elseif ($request->input('rapports') == 0 OR !$request->input('rapports')  OR $request->input('rapports') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 11)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 11)->first()->delete();
            }
        }

        if ($request->input('activites') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 12)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 12;
                $Config->save();
            }
        }elseif ($request->input('activites') == 0 OR !$request->input('activites')  OR $request->input('activites') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 12)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 12)->first()->delete();
            }
        }


        if ($request->input('cabinet') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 13)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 13;
                $Config->save();
            }
        }elseif ($request->input('cabinet') == 0 OR !$request->input('cabinet')  OR $request->input('cabinet') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 13)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 13)->first()->delete();
            }
        }

        if ($request->input('comptable') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 14)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 14;
                $Config->save();
            }
        }elseif ($request->input('comptable') == 0 OR !$request->input('comptable')  OR $request->input('comptable') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 14)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 14)->first()->delete();
            }
        }

        if ($request->input('reglement') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 15)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 15;
                $Config->save();
            }
        }elseif ($request->input('reglement') == 0 OR !$request->input('reglement')  OR $request->input('reglement') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 15)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 15)->first()->delete();
            }
        }


        if ($request->input('acceptation_paiement') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 16)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 16;
                $Config->save();
            }
        }elseif ($request->input('acceptation_paiement') == 0 OR !$request->input('acceptation_paiement')  OR $request->input('acceptation_paiement') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 16)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 16)->first()->delete();
            }
        }

        if ($request->input('regle') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 17)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 17;
                $Config->save();
            }
        }elseif ($request->input('regle') == 0 OR !$request->input('regle')  OR $request->input('regle') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 17)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 17)->first()->delete();
            }
        }

        if ($request->input('recurence') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 18)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 18;
                $Config->save();
            }
        }elseif ($request->input('recurence') == 0 OR !$request->input('recurence')  OR $request->input('recurence') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 18)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 18)->first()->delete();
            }
        }


        if ($request->input('utilisateurs') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 19)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 19;
                $Config->save();
            }
        }elseif ($request->input('utilisateurs') == 0 OR !$request->input('utilisateurs')  OR $request->input('utilisateurs') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 19)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 19)->first()->delete();
            }
        }


        if ($request->input('abonnements') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 20)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 20;
                $Config->save();
            }
        }elseif ($request->input('abonnements') == 0 OR !$request->input('abonnements')  OR $request->input('abonnements') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 20)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 20)->first()->delete();
            }
        }


        if ($request->input('infos_entreprise') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 21)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 21;
                $Config->save();
            }
        }elseif ($request->input('infos_entreprise') == 0 OR !$request->input('infos_entreprise')  OR $request->input('infos_entreprise') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 21)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 21)->first()->delete();
            }
        }


        if ($request->input('habilitations') == 1) {
            if (!ModulePack::where('package_id', $id)->where('module_id', 22)->first()) {
                $Config = new ModulePack();
                $Config->package_id = $id;
                $Config->module_id = 22;
                $Config->save();
            }
        }elseif ($request->input('habilitations') == 0 OR !$request->input('habilitations')  OR $request->input('habilitations') == null) {
            if (ModulePack::where('package_id', $id)->where('module_id', 22)->first()) {
                ModulePack::where('package_id', $id)->where('module_id', 22)->first()->delete();
            }
        }

        // dd($request->input('test'));
        // $Package =  Package::find($id);
        // $Package->type=$request->input('type');
        // $Package->prix=$request->input('prix');
        // $Package->nom=$request->input('nom');
        // $Package->description=$request->input('description');
        // $Package->update();
        return back()->with('success', "Abonnment mise à jour avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
       Package::find($id)->delete();
       return redirect(route('admin.parametres.packages.add'))->with('success', "Abonnement supprimé avec succés" );
    }
}
