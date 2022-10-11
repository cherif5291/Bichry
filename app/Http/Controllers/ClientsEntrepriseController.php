<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Models\DevisesMonetaire;
use App\Models\ClientsEntreprise;
use App\Models\PaiementsModalite;
use App\Http\Requests\ClientsEntrepriseStoreRequest;
use App\Http\Requests\ClientsEntrepriseUpdateRequest;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\Fournisseur;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class ClientsEntrepriseController extends Controller
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
            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Liste des clients ".$EntrepriseID;
            $Session = 1;
            return view('entreprise.clients.liste', compact('Clients', 'PageName', 'Session'));
        } else {
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Liste des clients";
            $Session = 0;
            return view('entreprise.clients.liste', compact('Clients', 'PageName', 'Session'));
        }


    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajouterClient()
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

            $PageName = "Nouveau client";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::all();
            $ModesPaiements = PaiementsMode::all();
            $ModalitePaiements = PaiementsModalite::all();
            return view('entreprise.clients.add',compact( 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'ModalitePaiements', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Nouveau client";
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::all();
            $ModesPaiements = PaiementsMode::all();
            $ModalitePaiements = PaiementsModalite::all();
            return view('entreprise.clients.add',compact( 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'ModalitePaiements', 'Session'));
        }


    }

    public function dossierClient($id)
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

            $Client = ClientsEntreprise::find($id);
            $PageName = "Informations sur le client";

            return view('entreprise.clients.dossier', compact('Client', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Client = ClientsEntreprise::find($id);
            $PageName = "Informations sur le client";

            return view('entreprise.clients.dossier', compact('Client', 'PageName', 'Session'));
        }


    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ClientsEntreprise $clientsEntreprise)
    {
        $this->authorize('view', $clientsEntreprise);

        return view(
            'app.clients_entreprises.show',
            compact('clientsEntreprise')
        );
    }


    public function typeClient()
    {

        return view('entreprise.clients.type');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ClientsEntreprise $clientsEntreprise
     * @return \Illuminate\Http\Response
     */
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

            $Client = ClientsEntreprise::find($id);
        $PageName = "Modification infos client";
        $DevisesMonetaires = DevisesMonetaire::all();
        $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
        $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
        $ModalitePaiements = PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();

        return view('entreprise.clients.edit', compact('Client' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'ModalitePaiements', 'Session'));
        } else {
            $Session = 0;
            $Client = ClientsEntreprise::find($id);
            $EntrepriseID = Auth::user()->entreprise_id;

        $PageName = "Modification infos client";
        $DevisesMonetaires = DevisesMonetaire::all();
        $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
        $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
        $ModalitePaiements = PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();

        return view('entreprise.clients.edit', compact('Client' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'ModalitePaiements', 'Session'));
        }


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'entreprise'=>'required',
            'prenom'=>'required',
            'nom'=>'required',

            'telephone'=>'required',
            'email'=>'required',
            'titre'=>'nullable',
            'adresse'=>'required',
            'ville'=>'required',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'pays'=>'required',
            'note'=>'nullable',
            'paiements_modalite_id'=>'nullable',
            'logo'=>'nullable',
            'devises_monetaire_id'=>'nullable',


        ]);
        $ClientsEntreprise = new ClientsEntreprise();

        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $ClientsEntreprise->entreprise_id=$EntrepriseID;;
        $ClientsEntreprise->entreprise=$request->input('entreprise');
        $ClientsEntreprise->prenom=$request->input('prenom');

        $ClientsEntreprise->nom=$request->input('nom');

        $ClientsEntreprise->email=$request->input('email');

        $ClientsEntreprise->telephone=$request->input('telephone');

        $ClientsEntreprise->adresse=$request->input('adresse');
        $ClientsEntreprise->ville=$request->input('ville');
        $ClientsEntreprise->province=$request->input('province');
        $ClientsEntreprise->pays=$request->input('pays');
        $ClientsEntreprise->code_postale=$request->input('code_postale');
        $ClientsEntreprise->note=$request->input('note');

        // dd($ClientsEntreprise);
        $ClientsEntreprise->paiements_modalite_id=$request->input('paiements_modalite_id');
        $ClientsEntreprise->titre=$request->input('titre');


        $ClientsEntreprise->devises_monetaire_id=$request->input('devises_monetaire_id');

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/ClientsEntreprises/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $ClientsEntreprise->logo = $path_name.$logo;
            }

        }

        $ClientsEntreprise->save();
        return redirect(route('entreprise.clients'))->with('success', "Fournisseur ajouté avec succès !");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'entreprise'=>'required',
            'prenom'=>'required',
            'nom'=>'required',

            'telephone'=>'required',

            'email'=>'required',

            'titre'=>'nullable',
            'adresse'=>'required',
            'ville'=>'required',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'pays'=>'required',
            'note'=>'nullable',
            'paiements_modalite_id'=>'nullable',
            'logo'=>'nullable',
            'devises_monetaire_id'=>'nullable',


        ]);
        $ClientsEntreprise = ClientsEntreprise::find($id);
        $ClientsEntreprise->entreprise=$request->input('entreprise');
        $ClientsEntreprise->prenom=$request->input('prenom');

        $ClientsEntreprise->nom=$request->input('nom');

        $ClientsEntreprise->email=$request->input('email');

        $ClientsEntreprise->telephone=$request->input('telephone');

        $ClientsEntreprise->adresse=$request->input('adresse');
        $ClientsEntreprise->ville=$request->input('ville');
        $ClientsEntreprise->province=$request->input('province');
        $ClientsEntreprise->pays=$request->input('pays');
        $ClientsEntreprise->code_postale=$request->input('code_postale');
        $ClientsEntreprise->note=$request->input('note');

        // dd($ClientsEntreprise);
        $ClientsEntreprise->paiements_modalite_id=$request->input('paiements_modalite_id');
        $ClientsEntreprise->titre=$request->input('titre');


        $ClientsEntreprise->devises_monetaire_id=$request->input('devises_monetaire_id');

        if ($request->hasFile('logo')) {

            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $path_name = 'storage/uploads/ClientsEntreprises/'. date('Y')."/". date('F'). '/';

            if ($request->logo->move($path_name, $logo)) {
                $ClientsEntreprise->logo = $path_name.$logo;
            }

        }

        $ClientsEntreprise->update();
        if (Auth::user()->role == "admin") {
            return back()->with('success', "Information du client mise à jour avec succès !");

        }
        return redirect(route('entreprise.clients'))->with('success', "Information du client mise à jour avec succès !");
    }
    public function destroy(
        Request $request,
        ClientsEntreprise $clientsEntreprise
    ) {
        $this->authorize('delete', $clientsEntreprise);

        $clientsEntreprise->delete();

        return redirect()
            ->route('clients-entreprises.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
