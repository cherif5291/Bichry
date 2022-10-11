<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\PaiementsModalite;
use App\Http\Requests\PaiementsModaliteStoreRequest;
use App\Http\Requests\PaiementsModaliteUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class PaiementsModaliteController extends Controller
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

            $PageName = "Ajouter une modalité de paiement";
            $Modalites =  PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.modalites.index', compact('Modalites', 'PageName', 'Session'));
        } else {

            $Session = 0;
            $PageName = "Ajouter une modalité de paiement";
            $Modalites =  PaiementsModalite::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.modalites.index', compact('Modalites', 'PageName', 'Session'));

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
        $Modalite = new PaiementsModalite();

        $Modalite->entreprise_id= $EntrepriseID;
        $Modalite->nom=$request->input('nom');
        $Modalite->duree=$request->input('duree');
        if ($Modalite->duree == "0") {
          $Modalite->duree = NULL;
          // var_dump($Modalite->duree);die();
        }
        $Modalite->save();
        return back()->with('success', "Modalité de paiement ajoutée avec succès !");
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

            $Modalite = PaiementsModalite::find($id);
            $PageName = "Modifier la modalité de paiement";
            $Modalites =  PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.parametres.modalites.edit', compact('Modalites', 'Modalite', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Modalite =PaiementsModalite::find($id);
            $PageName = "Modifier la modalité de paiement";
            $Modalites =  PaiementsModalite::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.parametres.modalites.edit', compact('Modalites', 'Modalite', 'PageName', 'Session'));

        }


    }

    public function update(Request $request, $id){
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
        $Modalite =  PaiementsModalite::find($id);
        $Modalite->entreprise_id= $EntrepriseID;
        $Modalite->nom=$request->input('nom');
        $Modalite->duree=$request->input('duree');
        $Modalite->update();
        return back()->with('success', "Modalité de paiement modifiée avec succès !");
    }

   //suppression
    public function destroy($id)
    {
        PaiementsModalite::find($id)->delete();
       return redirect(route('entreprise.modalite-paiement.liste'))->with('success', "Taxe suprimée avec succeès");
    }
}
