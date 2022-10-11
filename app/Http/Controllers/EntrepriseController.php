<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\ModelesRecu;
use Illuminate\Http\Request;
use App\Models\ModelesDevis;
use App\Models\ModelesFacture;
use App\Models\DevisesMonetaire;
use App\Http\Requests\EntrepriseStoreRequest;
use App\Http\Requests\EntrepriseUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

            $Entreprise = Entreprise::find($EntrepriseID);
            $PageName = "Infos Entreprise";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ModelesRecu = ModelesRecu::all();
            $ModelesDevis = ModelesDevis::all();
            $ModelesFacture = ModelesFacture::all();
            return view('entreprise.parametres.entreprise.infos', compact('Entreprise' , 'PageName', 'DevisesMonetaires', 'ModelesRecu', 'ModelesDevis', 'ModelesFacture', 'Session'));
        } else {
            $Session = 0;

            $Entreprise = Auth::user()->entreprise;
            $PageName = "Infos Entreprise";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ModelesRecu = ModelesRecu::all();
            $ModelesDevis = ModelesDevis::all();
            $ModelesFacture = ModelesFacture::all();
            return view('entreprise.parametres.entreprise.infos', compact('Entreprise' , 'PageName', 'DevisesMonetaires', 'ModelesRecu', 'ModelesDevis', 'ModelesFacture', 'Session'));
        }

    }



    public function infosChange(Request $request)
    {
        $this->validate($request, [
            'nom_entreprise'=>'required',
            'a_propos'=>'nullable',
            'email'=>'nullable',
            'telephone'=>'required',
            'portable'=>'nullable',
            'website'=>'nullable',
            'pays'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'adresse'=>'nullable',

            'devises_monetaire_id'=>'nullable',
            'logo'=>'nullable',



        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $User = Entreprise::find($EntrepriseID);
        $User->nom_entreprise=$request->input('nom_entreprise');
        $User->a_propos=$request->input('a_propos');
        $User->email=$request->input('email');
        $User->telephone=$request->input('telephone');
        $User->portable=$request->input('portable');
        $User->website=$request->input('website');
        $User->pays=$request->input('pays');
        $User->ville=$request->input('ville');
        $User->province=$request->input('province');
        $User->code_postale=$request->input('code_postale');
        $User->adresse=$request->input('adresse');
        $User->devises_monetaire_id=$request->input('devises_monetaire_id');

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/Entreprise/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $User->logo = $path_name.$logo;
            }
        }
        $User->update();
        return back()->with('success', "information modifier avec succès !");
    }


}
