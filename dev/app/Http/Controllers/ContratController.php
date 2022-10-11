<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Facture;
use App\Models\Project;
use App\Models\Entreprise;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\ClientsEntreprise;
use App\Models\EmployesEntreprise;
use App\Http\Requests\ContratStoreRequest;
use App\Http\Requests\ContratUpdateRequest;
use App\Models\ContratsModel;
use App\Models\ContratsType;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
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

            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', $EntrepriseID)->get();
            $Employes = EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $ModelsContrats = ContratsModel::where('entreprise_id', $EntrepriseID)->get();
            $Contrats = Contrat::where('entreprise_id',$EntrepriseID)->get();
            $PageName = "Contrats";
        return view('entreprise.contrats.contrats.index', compact('Clients', 'Fournisseurs', 'Employes', 'ModelsContrats', 'Contrats', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Employes = EmployesEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $ModelsContrats = ContratsModel::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Contrats = Contrat::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Contrats";
            return view('entreprise.contrats.contrats.index', compact('Clients', 'Fournisseurs', 'Employes', 'ModelsContrats', 'Contrats', 'PageName', 'Session'));

        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'contrats_model_id'=>'nullable',
            'interesse'=>'nullable',
            'montant'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        $nature = substr_replace($request->input('interesse') ?? "", "", 1);
        $indice = (int) filter_var($request->input('interesse'), FILTER_SANITIZE_NUMBER_INT);
        $ModelContrat = ContratsModel::find($request->input('contrats_model_id'));
        // dd($request->input('contrats_model_id'));
        $typeContrat = $ModelContrat->contratsType->nom;
        $Contrats = new Contrat();
        $Contrats->entreprise_id=$EntrepriseID;
        $Contrats->contrats_model_id=$request->input('contrats_model_id');
        $Contrats->nom=$request->input('nom');
        $Contrats->montant=$request->input('montant');
        $Contrats->type=$typeContrat;
        $Contrats->contenu= $ModelContrat->contenu;
        if ( $nature == "F") {
         $Contrats->fournisseur_id =$indice;
        }elseif ( $nature == "C") {
            $Contrats->clients_entreprise_id =$indice;
        }elseif ( $nature == "E") {
            $Contrats->employes_entreprise_id =$indice;
        }

        $Contrats->save();
        return redirect(route('entreprise.contrat.editContent', $Contrats->id))->with('success', "Veuillez a présent modifier le contenu du contrat!");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'=>'nullable',
            'contrats_model_id'=>'nullable',
            'clients_entreprise_id'=>'nullable',
            'employes_entreprise_id'=>'nullable',
            'fournisseur_id'=>'nullable',
            'montant'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);
        $ModelContrat = ContratsModel::find($request->input('contrats_model_id'));
        $typeContrat = $ModelContrat->contratsType->nom;
        $Contrats =  Contrat::find($id);
        $Contrats->entreprise_id=$EntrepriseID;
        $Contrats->contrats_model_id=$request->input('contrats_model_id');
        $Contrats->nom=$request->input('nom');
        $Contrats->montant=$request->input('montant');
        $Contrats->type=$typeContrat;
        if ( $nature == "F") {
         $Contrats->fournisseur_id =$indice;
        }elseif ( $nature == "C") {
            $Contrats->clients_entreprise_id =$indice;
        }elseif ( $nature == "E") {
            $Contrats->employes_entreprise_id =$indice;
        }
        $Contrats->update();
        return back()->with('success', "Veuillez a présent modifier le contenu du contrat!");
    }

    public function updateContent(Request $request, $id)
    {

        $this->validate($request, [
            'contenu'=>'nullable',
        ]);
        $Contrats =  Contrat::find($id);
        $Contrats->contenu=$request->input('contenu');
        $Contrats->update();
        return redirect(route('entreprise.contrat.show',  $Contrats->id))->with('success', "Contrat mise à jours avec succès!");
    }


    public function show($id)
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

            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', $EntrepriseID)->get();
            $Employes = EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $ModelsContrats = ContratsModel::where('entreprise_id', $EntrepriseID)->get();
            $Contrat = Contrat::find($id);
            $PageName = "Modification Contrat";
            return view('entreprise.contrats.contrats.show', compact('Clients', 'Fournisseurs', 'Employes', 'ModelsContrats', 'Contrat', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Employes = EmployesEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $ModelsContrats = ContratsModel::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Contrat = Contrat::find($id);
            $PageName = "Modification Contrat";
            return view('entreprise.contrats.contrats.show', compact('Clients', 'Fournisseurs', 'Employes', 'ModelsContrats', 'Contrat', 'PageName', 'Session'));

        }



    }

    public function editContent($id)
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

            $Contrat = Contrat::find($id);
            $PageName = "Contenu contrat";
            return view('entreprise.contrats.contrats.editContent', compact('Contrat', 'PageName', 'Session'));
        } else {
            $Session = 0;

            $Contrat = Contrat::find($id);
            $PageName = "Contenu contrat";
            return view('entreprise.contrats.contrats.editContent', compact('Contrat', 'PageName', 'Session'));

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

            $Contrat = Contrat::find($id);
            return view('entreprise.contrats.contrats.show', compact('Contrat', 'Session'));
        } else {
            $Session = 0;

            $Contrat = Contrat::find($id);
            return view('entreprise.contrats.contrats.show', compact('Contrat', 'Session'));

        }



    }


    public function destroy($id)
    {
        Contrat::find($id)->delete();
        return redirect(route('entreprise.contrats.liste'))->with('success', "Contrat suprimé avec succeès");
    }
}
