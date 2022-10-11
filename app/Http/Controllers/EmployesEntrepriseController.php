<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\EmployesEntreprise;
use App\Http\Requests\EmployesEntrepriseStoreRequest;
use App\Http\Requests\EmployesEntrepriseUpdateRequest;
use App\Models\Control;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsMode;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class EmployesEntrepriseController extends Controller
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

            $PageName = "Liste des employés";
            $Employes = EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
           return view('entreprise.rh.employes.index', compact('PageName', 'Employes', 'ModesPaiements', 'DevisesMonetaires', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Liste des employés";
            $Employes = EmployesEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
           return view('entreprise.rh.employes.index', compact('PageName', 'Employes', 'ModesPaiements', 'DevisesMonetaires', 'Session'));

        }

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

            $PageName = "Ajouter un employé";
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
           return view('entreprise.rh.employes.create', compact('PageName', 'ModesPaiements', 'DevisesMonetaires', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Ajouter un employé";
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
           return view('entreprise.rh.employes.create', compact('PageName', 'ModesPaiements', 'DevisesMonetaires', 'Session'));

        }

    }

    /**
     * @param \App\Http\Requests\EmployesEntrepriseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'nullable',
            'telephone'=>'required',
            'date_naissance'=>'nullable',
            'website'=>'nullable',
            'pays'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'adresse'=>'nullable',
            'genre'=>'nullable',
            'devises_monetaire_id'=>'nullable',
            'interval_paiement' => 'nullable',
            'date_embauche'=>'required',
            'remuneration'=>'required',
            'paiements_mode_id'=>'required',
            'poste'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Employe = new EmployesEntreprise();
        $Employe->entreprise_id = $EntrepriseID;
        $Employe->prenom=$request->input('prenom');
        $Employe->nom=$request->input('nom');
        $Employe->initial= $Employe->prenom[0].$Employe->nom[0];
        $Employe->email=$request->input('email');
        $Employe->telephone=$request->input('telephone');
        $Employe->date_naissance=$request->input('portable');
        $Employe->genre=$request->input('genre');
        $Employe->pays=$request->input('pays');
        $Employe->ville=$request->input('ville');
        $Employe->province=$request->input('province');
        $Employe->code_postale=$request->input('code_postale');
        $Employe->adresse=$request->input('adresse');
        $Employe->date_embauche=$request->input('date_embauche');
        $Employe->remuneration=$request->input('remuneration');
        $Employe->interval_paiement=$request->input('interval_paiement');
        $Employe->paiements_mode_id=$request->input('paiements_mode_id');
        $Employe->devises_monetaire_id=$request->input('devises_monetaire_id');
        $Employe->poste=$request->input('poste');
        $Employe->save();
        return redirect(route('entreprise.employes'))->with('success', "Employé ajouter avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('view', $employesEntreprise);

        return view(
            'app.employes_entreprises.show',
            compact('employesEntreprise')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            //data

            $Employe = EmployesEntreprise::find($id);
            $PageName = "Employé: ".$Employe->prenom." ".$Employe->nom;
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
            // $Country = Countries::all();
        return view('entreprise.rh.employes.edit', compact('PageName', 'Employe', 'ModesPaiements', 'DevisesMonetaires', 'Session'));
        } else {
            $Session = 0;

            $Employe = EmployesEntreprise::find($id);
            $PageName = "Employé: ".$Employe->prenom." ".$Employe->nom;
            $ModesPaiements = PaiementsMode::all();
            $DevisesMonetaires = DevisesMonetaire::all();
            // $Country = Countries::all();
        return view('entreprise.rh.employes.edit', compact('PageName', 'Employe', 'ModesPaiements', 'DevisesMonetaires', 'Session'));

        }

    }

    /**
     * @param \App\Http\Requests\EmployesEntrepriseUpdateRequest $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)   {
        $this->validate($request, [
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'nullable',
            'telephone'=>'required',
            'date_naissance'=>'nullable',
            'website'=>'nullable',
            'pays'=>'nullable',
            'ville'=>'nullable',
            'province'=>'nullable',
            'code_postale'=>'nullable',
            'adresse'=>'nullable',
            'genre'=>'nullable',
            'devises_monetaire_id'=>'nullable',
            'interval_paiement' => 'nullable',
            'date_embauche'=>'required',
            'remuneration'=>'required',
            'paiements_mode_id'=>'required',
            'poste'=>'nullable',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Employe =  EmployesEntreprise::find($id);
        $Employe->entreprise_id = $EntrepriseID;
        $Employe->prenom=$request->input('prenom');
        $Employe->nom=$request->input('nom');
        $Employe->initial= $Employe->prenom[0].$Employe->nom[0];
        $Employe->email=$request->input('email');
        $Employe->telephone=$request->input('telephone');
        $Employe->date_naissance=$request->input('portable');
        $Employe->genre=$request->input('genre');
        $Employe->pays=$request->input('pays');
        $Employe->ville=$request->input('ville');
        $Employe->province=$request->input('province');
        $Employe->code_postale=$request->input('code_postale');
        $Employe->adresse=$request->input('adresse');
        $Employe->date_embauche=$request->input('date_embauche');
        $Employe->remuneration=$request->input('remuneration');
        $Employe->interval_paiement=$request->input('interval_paiement');
        $Employe->paiements_mode_id=$request->input('paiements_mode_id');
        $Employe->devises_monetaire_id=$request->input('devises_monetaire_id');
        $Employe->poste=$request->input('poste');
        $Employe->update();
        return back()->with('success', "Employé mise à jour avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmployesEntreprise $employesEntreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EmployesEntreprise $employesEntreprise
    ) {
        $this->authorize('delete', $employesEntreprise);

        $employesEntreprise->delete();

        return redirect()
            ->route('employes-entreprises.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
