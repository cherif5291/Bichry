<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Habilitation;
use Illuminate\Http\Request;
use App\Models\Fonctionnalite;
use App\Http\Requests\HabilitationStoreRequest;
use App\Http\Requests\HabilitationUpdateRequest;
use App\Models\Abonnement;
use App\Models\Control;
use App\Models\ModulePack;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class HabilitationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            //data

            $PageName = "Habilitations";
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.habilitations.index', compact('Habilitations', 'PageName', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Habilitations";
            $Habilitations = Habilitation::all();
            return view('entreprise.parametres.habilitations.index', compact('Habilitations', 'PageName', 'Session'));
        }

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Habilitation::class);

        $users = User::pluck('name', 'id');
        $modules = Module::pluck('nom', 'id');
        $fonctionnalites = Fonctionnalite::pluck('nom', 'id');

        return view(
            'app.habilitations.create',
            compact('users', 'modules', 'fonctionnalites')
        );
    }

    /**
     * @param \App\Http\Requests\HabilitationStoreRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'entreprise_id'=>'nullable',
            'habilitation'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $habilitation = new Habilitation();
        $habilitation->entreprise_id=$EntrepriseID;
        $habilitation->habilitation=$request->input('habilitation');
        $habilitation->save();
        return back()->with('success', "Habilitation ajouter avec succès !");
    }

    public function updateName(Request $request, $id)
    {
        $this->validate($request, [
            'entreprise_id'=>'nullable',
            'habilitation'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $habilitation = Habilitation::find($id);
        $habilitation->entreprise_id= $EntrepriseID;
        $habilitation->habilitation=$request->input('habilitation');
        $habilitation->update();
        return back()->with('success', "Habilitation mise à jour avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Habilitation $habilitation)
    {
        $this->authorize('view', $habilitation);

        return view('app.habilitations.show', compact('habilitation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Habilitation $habilitation)
    {
        $this->authorize('update', $habilitation);

        $users = User::pluck('name', 'id');
        $modules = Module::pluck('nom', 'id');
        $fonctionnalites = Fonctionnalite::pluck('nom', 'id');

        return view(
            'app.habilitations.edit',
            compact('habilitation', 'users', 'modules', 'fonctionnalites')
        );
    }

    /**
     * @param \App\Http\Requests\HabilitationUpdateRequest $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {

        $this->validate($request, [

            'voir1'=>'nullable',
            'voir2'=>'nullable',
            'voir3'=>'nullable',
            'voir4'=>'nullable',
            'voir5'=>'nullable',
            'voir6'=>'nullable',
            'voir7'=>'nullable',
            'voir8'=>'nullable',
            'voir9'=>'nullable',
            'voir10'=>'nullable',
            'voir11'=>'nullable',
            'voir12'=>'nullable',
            'voir13'=>'nullable',
            'voir14'=>'nullable',
            'voir15'=>'nullable',
            'voir16'=>'nullable',
            'voir17'=>'nullable',
            'voir18'=>'nullable',
            'voir19'=>'nullable',
            'voir20'=>'nullable',
            'voir21'=>'nullable',
            'voir22'=>'nullable',

            'modifier1'=>'nullable',
            'modifier2'=>'nullable',
            'modifier3'=>'nullable',
            'modifier4'=>'nullable',
            'modifier5'=>'nullable',
            'modifier6'=>'nullable',
            'modifier7'=>'nullable',
            'modifier8'=>'nullable',
            'modifier9'=>'nullable',
            'modifier10'=>'nullable',
            'modifier11'=>'nullable',
            'modifier12'=>'nullable',
            'modifier13'=>'nullable',
            'modifier14'=>'nullable',
            'modifier15'=>'nullable',
            'modifier16'=>'nullable',
            'modifier17'=>'nullable',
            'modifier18'=>'nullable',
            'modifier19'=>'nullable',
            'modifier20'=>'nullable',
            'modifier21'=>'nullable',
            'modifier22'=>'nullable',

            'ajouter1'=>'nullable',
            'ajouter2'=>'nullable',
            'ajouter3'=>'nullable',
            'ajouter4'=>'nullable',
            'ajouter5'=>'nullable',
            'ajouter6'=>'nullable',
            'ajouter7'=>'nullable',
            'ajouter8'=>'nullable',
            'ajouter9'=>'nullable',
            'ajouter10'=>'nullable',
            'ajouter11'=>'nullable',
            'ajouter12'=>'nullable',
            'ajouter13'=>'nullable',
            'ajouter14'=>'nullable',
            'ajouter15'=>'nullable',
            'ajouter16'=>'nullable',
            'ajouter17'=>'nullable',
            'ajouter18'=>'nullable',
            'ajouter19'=>'nullable',
            'ajouter20'=>'nullable',
            'ajouter21'=>'nullable',
            'ajouter22'=>'nullable',

            'supprimer1'=>'nullable',
            'supprimer2'=>'nullable',
            'supprimer3'=>'nullable',
            'supprimer4'=>'nullable',
            'supprimer5'=>'nullable',
            'supprimer6'=>'nullable',
            'supprimer7'=>'nullable',
            'supprimer8'=>'nullable',
            'supprimer9'=>'nullable',
            'supprimer10'=>'nullable',
            'supprimer11'=>'nullable',
            'supprimer12'=>'nullable',
            'supprimer13'=>'nullable',
            'supprimer14'=>'nullable',
            'supprimer15'=>'nullable',
            'supprimer16'=>'nullable',
            'supprimer17'=>'nullable',
            'supprimer18'=>'nullable',
            'supprimer19'=>'nullable',
            'supprimer20'=>'nullable',
            'supprimer21'=>'nullable',
            'supprimer22'=>'nullable',



        ]);

        $PackageEntreprise = Abonnement::where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
        $ModuleEntreprise = ModulePack::where('package_id', $PackageEntreprise)->get();
        foreach ($ModuleEntreprise as $module) {

            if (Fonctionnalite::where('module_id',$module->module_id)->where('habilitation_id', $id)->first()) {
                if ($request->input("voir".$module->module_id)==1 OR $request->input("ajouter".$module->module_id)==1 OR $request->input("supprimer".$module->module_id)==1 OR $request->input("modifier".$module->module_id)==1 ) {
                    $fonctionnalite = Fonctionnalite::where('module_id',$module->module_id)->where('habilitation_id', $id)->first();
                    $fonctionnalite->module_id = $module->module_id;

                    $fonctionnalite->habilitation_id = $id;
                    if ($request->input("modifier".$module->module_id)==1) {
                        $fonctionnalite->modifier = "yes";
                    }else {
                        $fonctionnalite->modifier = "no";
                    }

                    if ($request->input("supprimer".$module->module_id)==1) {
                        $fonctionnalite->supprimer = "yes";
                    }else {
                        $fonctionnalite->supprimer = "no";
                    }

                    if ($request->input("ajouter".$module->module_id)==1) {
                        $fonctionnalite->ajouter = "yes";
                    }else {
                        $fonctionnalite->ajouter = "no";
                    }

                    if ($request->input("voir".$module->module_id)==1) {
                        $fonctionnalite->voir = "yes";
                    }else {
                        $fonctionnalite->voir = "no";
                    }
                    $fonctionnalite->update();

                }else {
                    Fonctionnalite::where('module_id',$module->module_id)->where('habilitation_id', $id)->first()->delete();
                }
            }else {

                $fonctionnalite = new Fonctionnalite();
                $fonctionnalite->module_id = $module->module_id;

                $fonctionnalite->habilitation_id = $id;
                if ($request->input("modifier".$module->module_id)==1) {
                    $fonctionnalite->modifier = "yes";
                }else {
                    $fonctionnalite->modifier = "no";
                }

                if ($request->input("supprimer".$module->module_id)==1) {
                    $fonctionnalite->supprimer = "yes";
                }else {
                    $fonctionnalite->supprimer = "no";
                }

                if ($request->input("ajouter".$module->module_id)==1) {
                    $fonctionnalite->ajouter = "yes";
                }else {
                    $fonctionnalite->ajouter = "no";
                }

                if ($request->input("voir".$module->module_id)==1) {
                    $fonctionnalite->voir = "yes";
                }else {
                    $fonctionnalite->voir = "no";
                }
                $fonctionnalite->save();
            }

        }

            // if (Fonctionnalite::where('module_id',1)->where('habilitation_id', $id)->first()) {
            //     if ($request->input('voir1') == 1 OR $request->input('ajouter1') == 1 OR $request->input('supprimer1')  == 1 OR $request->input('modifier1')  == 1 ) {
            //         $fonctionnalite = Fonctionnalite::where('module_id',1)->where('habilitation_id', $id)->first();
            //         $fonctionnalite->module_id = 1;

            //         $fonctionnalite->habilitation_id = $id;
            //         if ($request->input('modifier1') == 1) {
            //             $fonctionnalite->modifier = "yes";
            //         }elseif($request->input('ajouter1')==0) {
            //             $fonctionnalite->modifier = "no";
            //         }

            //         if ($request->input('supprimer1') == 1) {
            //             $fonctionnalite->supprimer = "yes";
            //         }elseif($request->input('ajouter1')==0) {
            //             $fonctionnalite->supprimer = "no";
            //         }

            //         if ($request->input('ajouter1') == 1) {
            //             $fonctionnalite->ajouter = "yes";
            //         }elseif($request->input('ajouter1')==0) {
            //             $fonctionnalite->ajouter = "no";
            //         }

            //         if ($request->input('voir1') == 1) {
            //             $fonctionnalite->voir = "yes";
            //         }elseif($request->input('ajouter1')==0) {
            //             $fonctionnalite->voir = "no";
            //         }
            //         $fonctionnalite->update();

            //     }elseif($request->input('ajouter1')==0) {
            //         Fonctionnalite::where('module_id',1)->where('habilitation_id', $id)->first()->delete();
            //     }
            // }else {

            //     $fonctionnalite = new Fonctionnalite();
            //     $fonctionnalite->module_id = 1;

            //     $fonctionnalite->habilitation_id = $id;
            //     if ($request->input('modifier1') == 1) {
            //         $fonctionnalite->modifier = "yes";
            //     }elseif($request->input('ajouter1')==0) {
            //         $fonctionnalite->modifier = "no";
            //     }

            //     if ($request->input('supprimer1') == 1) {
            //         $fonctionnalite->supprimer = "yes";
            //     }elseif($request->input('ajouter1')==0) {
            //         $fonctionnalite->supprimer = "no";
            //     }

            //     if ($request->input('ajouter1') == 1) {
            //         $fonctionnalite->ajouter = "yes";
            //     }elseif($request->input('ajouter1')==0) {
            //         $fonctionnalite->ajouter = "no";
            //     }

            //     if ($request->input('voir1') == 1) {
            //         $fonctionnalite->voir = "yes";
            //     }elseif($request->input('ajouter1')==0) {
            //         $fonctionnalite->voir = "no";
            //     }
            //     $fonctionnalite->save();
            // }

            //fournisseurs
            // if (Fonctionnalite::where('module_id',2)->where('habilitation_id', $id)->first()) {
            //     if ($request->input("voir2")>1 OR $request->input("ajouter2")>1 OR $request->input("supprimer2")>1 OR $request->input("modifier2")>1 ) {
            //         $fonctionnalite = Fonctionnalite::where('module_id',2)->where('habilitation_id', $id)->first();
            //         $fonctionnalite->module_id = 2;

            //         $fonctionnalite->habilitation_id = $id;
            //         if ($request->input("modifier2")>1) {
            //             $fonctionnalite->modifier = "yes";
            //         }else {
            //             $fonctionnalite->modifier = "no";
            //         }

            //         if ($request->input("supprimer2")>1) {
            //             $fonctionnalite->supprimer = "yes";
            //         }else {
            //             $fonctionnalite->supprimer = "no";
            //         }

            //         if ($request->input("ajouter2")>1) {
            //             $fonctionnalite->ajouter = "yes";
            //         }else {
            //             $fonctionnalite->ajouter = "no";
            //         }

            //         if ($request->input("voir2")>1) {
            //             $fonctionnalite->voir = "yes";
            //         }else {
            //             $fonctionnalite->voir = "no";
            //         }
            //         $fonctionnalite->update();

            //     }else {
            //         Fonctionnalite::where('module_id',2)->where('habilitation_id', $id)->first()->delete();
            //     }
            // }else {

            //     $fonctionnalite = new Fonctionnalite();
            //     $fonctionnalite->module_id = 2;

            //     $fonctionnalite->habilitation_id = $id;
            //     if ($request->input("modifier2")>1) {
            //         $fonctionnalite->modifier = "yes";
            //     }else {
            //         $fonctionnalite->modifier = "no";
            //     }

            //     if ($request->input("supprimer2")>1) {
            //         $fonctionnalite->supprimer = "yes";
            //     }else {
            //         $fonctionnalite->supprimer = "no";
            //     }

            //     if ($request->input("ajouter2")>1) {
            //         $fonctionnalite->ajouter = "yes";
            //     }else {
            //         $fonctionnalite->ajouter = "no";
            //     }

            //     if ($request->input("voir2")>1) {
            //         $fonctionnalite->voir = "yes";
            //     }else {
            //         $fonctionnalite->voir = "no";
            //     }
            //     $fonctionnalite->save();
            // }

            //3
            // if (Fonctionnalite::where('module_id',$ModuleEntreprise[$id]->module_id)->where('habilitation_id', $id)->first()) {
            //     if ($request->input("voir".$ModuleEntreprise[$id]->module_id)==1 OR $request->input("ajouter".$ModuleEntreprise[$id]->module_id)==1 OR $request->input("supprimer".$ModuleEntreprise[$id]->module_id)==1 OR $request->input("modifier".$ModuleEntreprise[$id]->module_id)==1 ) {
            //         $fonctionnalite = Fonctionnalite::where('module_id',$ModuleEntreprise[$id]->module_id)->where('habilitation_id', $id)->first();
            //         $fonctionnalite->module_id = $ModuleEntreprise[$id]->module_id;

            //         $fonctionnalite->habilitation_id = $id;
            //         if ($request->input("modifier".$ModuleEntreprise[$id]->module_id)==1) {
            //             $fonctionnalite->modifier = "yes";
            //         }else {
            //             $fonctionnalite->modifier = "no";
            //         }

            //         if ($request->input("supprimer".$ModuleEntreprise[$id]->module_id)==1) {
            //             $fonctionnalite->supprimer = "yes";
            //         }else {
            //             $fonctionnalite->supprimer = "no";
            //         }

            //         if ($request->input("ajouter".$ModuleEntreprise[$id]->module_id)==1) {
            //             $fonctionnalite->ajouter = "yes";
            //         }else {
            //             $fonctionnalite->ajouter = "no";
            //         }

            //         if ($request->input("voir".$ModuleEntreprise[$id]->module_id)==1) {
            //             $fonctionnalite->voir = "yes";
            //         }else {
            //             $fonctionnalite->voir = "no";
            //         }
            //         $fonctionnalite->update();

            //     }else {
            //         Fonctionnalite::where('module_id',$ModuleEntreprise[$id]->module_id)->where('habilitation_id', $id)->first()->delete();
            //     }
            // }else {

            //     $fonctionnalite = new Fonctionnalite();
            //     $fonctionnalite->module_id = $ModuleEntreprise[$id]->module_id;

            //     $fonctionnalite->habilitation_id = $id;
            //     if ($request->input("modifier".$ModuleEntreprise[$id]->module_id)==1) {
            //         $fonctionnalite->modifier = "yes";
            //     }else {
            //         $fonctionnalite->modifier = "no";
            //     }

            //     if ($request->input("supprimer".$ModuleEntreprise[$id]->module_id)==1) {
            //         $fonctionnalite->supprimer = "yes";
            //     }else {
            //         $fonctionnalite->supprimer = "no";
            //     }

            //     if ($request->input("ajouter".$ModuleEntreprise[$id]->module_id)==1) {
            //         $fonctionnalite->ajouter = "yes";
            //     }else {
            //         $fonctionnalite->ajouter = "no";
            //     }

            //     if ($request->input("voir".$ModuleEntreprise[$id]->module_id)==1) {
            //         $fonctionnalite->voir = "yes";
            //     }else {
            //         $fonctionnalite->voir = "no";
            //     }
            //     $fonctionnalite->save();
            // }
        return back()->with('success', "Habilitation mise à jour avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Habilitation $habilitation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mycart = Fonctionnalite::where('habilitation_id', $id)->get();
            foreach ($mycart as $c) {
                $c->delete();
            }
        Habilitation::find($id)->delete();
        return redirect(route('entreprise.habilitations'))->with('success', "Habilitations supprimé avec succès");
    }
}
