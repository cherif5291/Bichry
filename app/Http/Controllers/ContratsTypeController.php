<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\ContratsType;
use Illuminate\Http\Request;
use App\Http\Requests\ContratsTypeStoreRequest;
use App\Http\Requests\ContratsTypeUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class ContratsTypeController extends Controller
{

    public function index()
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

            $PageName = "Types de contratss";
            $TypesContrats =  ContratsType::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.contrats.types.index', compact('TypesContrats', 'PageName', 'Session'));
        } else {

            $Session = 0;
            $PageName = "Types de contratss";
            $TypesContrats =  ContratsType::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.contrats.types.index', compact('TypesContrats', 'PageName', 'Session'));

        }


    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'description'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $TypesContrat = new ContratsType();
        $TypesContrat->entreprise_id= $EntrepriseID;
        $TypesContrat->nom=$request->input('nom');
        $TypesContrat->description=$request->input('description');
        $TypesContrat->save();
        return back()->with('success', "Type de contrat ajouté avec succès !");
    }


    public function edit($id)
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

            $TypesContrat =ContratsType::find($id);
            $PageName = "Modification du type de contrat";
            $TypesContrats =  ContratsType::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.contrats.types.edit', compact('TypesContrats', 'TypesContrat', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $TypesContrat =ContratsType::find($id);
            $PageName = "Modification du type de contrat";
            $TypesContrats =  ContratsType::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.contrats.types.edit', compact('TypesContrats', 'TypesContrat', 'PageName', 'Session'));

        }


    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nom'=>'required',
            'description'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $TypesContrat =  ContratsType::find($id);
        $TypesContrat->entreprise_id= $EntrepriseID;
        $TypesContrat->nom=$request->input('nom');
        $TypesContrat->description=$request->input('description');
        $TypesContrat->update();
        return back()->with('success', "Type de contrat modifié avec succès !");
    }

   //suppression
    public function destroy($id)
    {
       ContratsType::find($id)->delete();
       return redirect(route('entreprise.type-contrat.liste'))->with('success', "Type de contrat suprimé avec succeès");
    }
}
