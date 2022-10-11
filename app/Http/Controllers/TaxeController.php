<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use Illuminate\Http\Request;
use App\Http\Requests\TaxeStoreRequest;
use App\Http\Requests\TaxeUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class TaxeController extends Controller
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

            $PageName = "Ajouter une taxe";
            $Taxes =  Taxe::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.taxes.index', compact('Taxes', 'PageName', 'Session'));
        } else {

            $Session = 0;
            $PageName = "Ajouter une taxe";
            $Taxes =  Taxe::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.taxes.index', compact('Taxes', 'PageName', 'Session'));

        }


    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'taux'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Taxe = new Taxe();
        $Taxe->entreprise_id= $EntrepriseID;
        $Taxe->nom=$request->input('nom');
        $Taxe->taux=$request->input('taux');
        $Taxe->save();
        return back()->with('success', "Taxe ajoutée avec succès !");
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

            $Taxe = Taxe::find($id);
            $PageName = "Modifier la taxe";
            $Taxes =  Taxe::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.taxes.edit', compact('Taxe', 'Taxes', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Taxe =Taxe::find($id);
            $PageName = "Modifier la taxe";
            $Taxes =  Taxe::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.taxes.edit', compact('Taxe', 'Taxes', 'PageName', 'Session'));

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
        $Taxe =  Taxe::find($id);
        $Taxe->entreprise_id= $EntrepriseID;
        $Taxe->nom=$request->input('nom');
        $Taxe->taux=$request->input('taux');
        $Taxe->update();
        return back()->with('success', "Taxe modifié avec succès !");
    }

   //suppression
    public function destroy($id)
    {
        Taxe::find($id)->delete();
       return redirect(route('entreprise.taxes.liste'))->with('success', "Taxe suprimée avec succeès");
    }
}
