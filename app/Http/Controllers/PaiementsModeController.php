<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Http\Requests\PaiementsModeStoreRequest;
use App\Http\Requests\PaiementsModeUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class PaiementsModeController extends Controller
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

            $PageName = "Ajouter une mode de paiement";
            $Modes =  PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.modePaiement.index', compact('Modes', 'PageName', 'Session'));
        } else {

            $Session = 0;
            $PageName = "Ajouter un mode de paiement";
            $Modes =  PaiementsMode::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.modePaiement.index', compact('Modes', 'PageName', 'Session'));

        }


    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'duree'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Mode = new PaiementsMode();
        $Mode->entreprise_id= $EntrepriseID;
        $Mode->nom=$request->input('nom');
        $Mode->save();
        return back()->with('success', "Mode de paiement ajouté avec succès !");
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

            $Mode = PaiementsMode::find($id);
            $PageName = "Modifier un mode de paiement";
            $Modes =  PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.modePaiement.edit', compact('Mode', 'Modes', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Mode =PaiementsMode::find($id);
            $PageName = "Modifier un mode de paiement";
            $Modes =  PaiementsMode::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.modePaiement.edit', compact('Modes', 'Mode', 'PageName', 'Session'));

        }


    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nom'=>'required',

        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Mode =  PaiementsMode::find($id);
        $Mode->entreprise_id= $EntrepriseID;
        $Mode->nom=$request->input('nom');
        $Mode->update();
        return back()->with('success', "Mode de paiement modifiée avec succès !");
    }

   //suppression
    public function destroy($id)
    {
        PaiementsMode::find($id)->delete();
       return redirect(route('entreprise.mode-paiement.liste'))->with('success', "Mode de paiement suprimé avec succeès");
    }
}
