<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;
use App\Http\Requests\FournisseurStoreRequest;
use App\Http\Requests\FournisseurUpdateRequest;
use App\Models\Control;
use App\Models\PaiementsMode;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
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

            $Fournisseurs = Fournisseur::where('entreprise_id', $EntrepriseID)->get();
            $PageName = __('messages.vendors_list');
            return view('entreprise.depenses.fournisseurs.list', compact('Fournisseurs', 'PageName', 'Session'));
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;

            $Session = 0;
            $Fournisseurs = Fournisseur::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = __('messages.vendors_list');
            return view('entreprise.depenses.fournisseurs.list', compact('Fournisseurs', 'PageName', 'Session'));
        }

    }

    public function addnew()
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

            $PageName = "Ajouter un nouveau fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.depenses.fournisseurs.add', compact( 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        } else {
            $Session = 0;
            $EntrepriseID = Auth::user()->entreprise_id;
            $PageName = "Ajouter un nouveau fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.depenses.fournisseurs.add', compact( 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        }

    }

    public function details($id)
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

            $Fournisseur = Fournisseur::find($id);
            $PageName = "Modification infos fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get()();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get()();
            return view('entreprise.depenses.fournisseurs.details', compact('Fournisseur' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        } else {
            $Session = 0;
            $EntrepriseID = Auth::user()->entreprise_id;

            $Fournisseur = Fournisseur::find($id);
            $PageName = "Modification infos fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.depenses.fournisseurs.details', compact('Fournisseur' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        }

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

            $Fournisseur = Fournisseur::find($id);

            $PageName = "Modification infos fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.depenses.fournisseurs.edit', compact('Fournisseur' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        } else {
            $Session = 0;
            $EntrepriseID = Auth::user()->entreprise_id;

            $Fournisseur = Fournisseur::find($id);
            $PageName = "Modification infos fourniseur";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.depenses.fournisseurs.edit', compact('Fournisseur' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'Session'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'entreprise'=>'required',
            'prenom'=>'nullable',
            'nom'=>'nullable',

            'telephone'=>'required',

            'email'=>'required',

            'titre'=>'nullable',
            'adresse'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postal'=>'nullable',
            'pays'=>'nullable',
            'note'=>'nullable',
            'paiements_modalite_id'=>'nullable',
            'numero_compte'=>'nullable',
            'logo'=>'nullable',
            'comptescomptable_id'=>'nullable',
            'devises_monetaire_id'=>'nullable',


        ]);
        $Fournisseur = new Fournisseur();
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Fournisseur->entreprise_id=$EntrepriseID;

        $Fournisseur->entreprise=$request->input('entreprise');
        $Fournisseur->prenom=$request->input('prenom');

        $Fournisseur->nom=$request->input('nom');

        $Fournisseur->email=$request->input('email');

        $Fournisseur->telephone=$request->input('telephone');

        $Fournisseur->adresse=$request->input('adresse');
        $Fournisseur->ville=$request->input('ville');
        $Fournisseur->province=$request->input('province');
        $Fournisseur->pays=$request->input('pays');
        $Fournisseur->code_postal=$request->input('code_postal');
        $Fournisseur->note=$request->input('note');

        $Fournisseur->paiements_modalite_id=$request->input('paiements_modalite_id');
        $Fournisseur->titre=$request->input('titre');
        $Fournisseur->numero_compte=$request->input('numero_compte');
        $Fournisseur->comptescomptable_id=$request->input('comptescomptable_id');


        $Fournisseur->devises_monetaire_id=$request->input('devises_monetaire_id');

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/fournisseurs/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $Fournisseur->logo = $path_name.$logo;
            }

        }

        $Fournisseur->save();
        return redirect(route('entreprise.fournisseurs.list'))->with('success', "Fournisseur ajouté avec succès !");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'entreprise'=>'required',
            'prenom'=>'nullable',
            'nom'=>'nullable',

            'telephone'=>'required',

            'email'=>'required',
            'titre'=>'nullable',
            'adresse'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postal'=>'nullable',
            'pays'=>'nullable',
            'note'=>'nullable',
            'paiements_modalite_id'=>'nullable',
            'numero_compte'=>'nullable',
            'logo'=>'nullable',
            'comptescomptable_id'=>'nullable',
            'devises_monetaire_id'=>'nullable',


        ]);
        $Fournisseur = Fournisseur::find($id);
        $Fournisseur->entreprise=$request->input('entreprise');
        $Fournisseur->prenom=$request->input('prenom');

        $Fournisseur->nom=$request->input('nom');

        $Fournisseur->email=$request->input('email');

        $Fournisseur->telephone=$request->input('telephone');

        $Fournisseur->adresse=$request->input('adresse');
        $Fournisseur->ville=$request->input('ville');
        $Fournisseur->province=$request->input('province');
        $Fournisseur->pays=$request->input('pays');
        $Fournisseur->code_postal=$request->input('code_postal');
        $Fournisseur->note=$request->input('note');

        $Fournisseur->paiements_modalite_id=$request->input('paiements_modalite_id');
        $Fournisseur->titre=$request->input('titre');
        $Fournisseur->numero_compte=$request->input('numero_compte');
        $Fournisseur->comptescomptable_id=$request->input('comptescomptable_id');


        $Fournisseur->devises_monetaire_id=$request->input('devises_monetaire_id');

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/fournisseurs/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $Fournisseur->logo = $path_name.$logo;
            }

        }

        $Fournisseur->update();
        return redirect(route('entreprise.fournisseurs.list'))->with('success', "Information du fournisseur mise à jour avec succès !");
    }

    public function delete($id){
        $Fournisseur = Fournisseur::find($id);
        if($Fournisseur){
            $status = $Fournisseur->delete();
            if($status){
                return redirect()->route('entreprise.fournisseurs.list')->with('success', 'Fournisseur supprimer avec succès !');
            }else{
                return back()->with('error', 'Fournisseur non supprimer');
            }

        }else{
            return redirect(route('entreprise.fournisseurs.list'))->with('error', 'Fournisseur introuvable');
        }

    }
}
