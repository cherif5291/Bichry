<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\Comptescomptable;
use App\Http\Requests\ComptescomptableStoreRequest;
use App\Http\Requests\ComptescomptableUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class ComptescomptableController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            $Comptescomptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $Session = 1;
            $type = "add";
            return view('entreprise.comptecomptable.index', compact('Comptescomptables', 'EntrepriseID', 'Session', 'type'));
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
            $Comptescomptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $Session = 0;
            $type = "add";
            return view('entreprise.comptecomptable.index', compact('Comptescomptables', 'EntrepriseID', 'Session', 'type'));
        }

    }

    public function viewDefaults()
    {

        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            $ComptesComptables = Comptescomptable::where('type', "default")->get();
            $Session = 1;
            return view('entreprise.comptecomptable.defaults', compact('ComptesComptables', 'EntrepriseID', 'Session'));
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
            $ComptesComptables = Comptescomptable::where('type', "default")->get();
            $Session = 0;
            return view('entreprise.comptecomptable.defaults', compact('ComptesComptables', 'EntrepriseID', 'Session'));
        }

    }

    public function addDefauls($id)
    {
        $Compte = Comptescomptable::find($id);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $Comptescomptable = new Comptescomptable();
        $Comptescomptable->entreprise_id= $EntrepriseID;
        $Comptescomptable->numero_compte=$Compte->numero_compte;
        $Comptescomptable->nom=$Compte->nom;
        $Comptescomptable->save();
        return back()->with('success', "Comptes comptable ajoutée avec succès!");
    }



    public function store(Request $request)
    {
        $this->validate($request, [
          'nom'=>'required',
          'numero_compte'=>'required',
          'type_compte'=>'nullable',
          'sous_type_compte'=>'nullable',

        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $Comptescomptable = new Comptescomptable();
        $Comptescomptable->entreprise_id= $EntrepriseID;
        $Comptescomptable->numero_compte=$request->input('numero_compte');
        $Comptescomptable->nom=$request->input('nom');
        $Comptescomptable->type_compte=$request->input('type_compte');
        $Comptescomptable->sous_type_compte=$request->input('sous_type_compte');
        $Comptescomptable->save();
        return back()->with('success', "Compte comptable ajoutée avec succès!");
    }


    public function edit($id)
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            $Comptescomptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $Comptescomptable = Comptescomptable::find($id);

            $Session = 1;
            $type = "edit";
            return view('entreprise.comptecomptable.index', compact('Comptescomptable','Comptescomptables', 'EntrepriseID', 'Session', 'type'));
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
            $Comptescomptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $Comptescomptable = Comptescomptable::find($id);

            $Session = 0;
            $type = "edit";
            return view('entreprise.comptecomptable.index', compact('Comptescomptable', 'Comptescomptables', 'EntrepriseID', 'Session', 'type'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'required',
            'numero_compte'=>'required',
            'type_compte'=>'nullable',
            'sous_type_compte'=>'nullable',

        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $Comptescomptable =  Comptescomptable::find($id);
        $Comptescomptable->entreprise_id= $EntrepriseID;
        $Comptescomptable->numero_compte=$request->input('numero_compte');
        $Comptescomptable->nom=$request->input('nom');
        $Comptescomptable->type_compte=$request->input('type_compte');
        $Comptescomptable->sous_type_compte=$request->input('sous_type_compte');

        $Comptescomptable->update();
        return back()->with('success', "Comptes comptable modifié avec succès!");
    }

    public function destroy($id) {
        Comptescomptable::find($id)->delete();
        return redirect(route('entreprise.compte-comptable'))->with('success', "Comptes comptable supprimé avec succès!");
    }


    public function defaults()
    {
       $Comptescomptables =  Comptescomptable::where('type', "default")->get();
       $type = "add";
       return view('admin.comptecomptable.index', compact('Comptescomptables', 'type'));
    }

    public function defaultsEdit($id)
    {
       $Comptescomptables =  Comptescomptable::where('type', "default")->get();
       $Comptescomptable =  Comptescomptable::find($id);
       $type = "edit";
       return view('admin.comptecomptable.index', compact('Comptescomptables', 'Comptescomptable', 'type'));
    }

    public function defaultsStore(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'numero_compte'=>'required',
        ]);

        $Comptescomptable = new Comptescomptable();
        $Comptescomptable->entreprise_id= 0;
        $Comptescomptable->numero_compte=$request->input('numero_compte');
        $Comptescomptable->nom=$request->input('nom');
        $Comptescomptable->type="default";
        $Comptescomptable->save();
        return back()->with('success', "Comptes comptable ajoutée avec succès!");
    }

    public function defaultsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'required',
            'numero_compte'=>'required',
        ]);
        $Comptescomptable = Comptescomptable::find($id);
        $Comptescomptable->entreprise_id= 0;
        $Comptescomptable->numero_compte=$request->input('numero_compte');
        $Comptescomptable->nom=$request->input('nom');
        $Comptescomptable->type="default";
        $Comptescomptable->update();
        return back()->with('success', "Comptes comptable mise à jour avec succès!");
    }

}
