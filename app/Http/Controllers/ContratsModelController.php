<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\ContratsType;
use App\Models\ContratsModel;
use App\Http\Requests\ContratsModelStoreRequest;
use App\Http\Requests\ContratsModelUpdateRequest;
use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Support\Facades\Auth;

class ContratsModelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

            $PageName = "Modèles de contrats";
            $ModelsContrats = ContratsModel::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.contrats.models.index', compact('ModelsContrats', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $PageName = "Modèles de contrats";
            $ModelsContrats = ContratsModel::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.contrats.models.index', compact('ModelsContrats', 'PageName', 'Session'));

        }


    }


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

            $PageName = "Ajouter d'un modèle de contrats";
        $TypesContrats = ContratsType::where('entreprise_id', $EntrepriseID)->get();
        return view('entreprise.contrats.models.add', compact('TypesContrats', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $PageName = "Ajouter d'un modèle de contrats";
        $TypesContrats = ContratsType::where('entreprise_id', Auth::user()->entreprise_id)->get();
        return view('entreprise.contrats.models.add', compact('TypesContrats', 'PageName', 'Session'));

        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'required',
            'contrats_type_id'=>'required',
            'contenu'=>'required',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $ModelsContrat = new ContratsModel();
        $ModelsContrat->entreprise_id=$EntrepriseID;
        $ModelsContrat->nom=$request->input('nom');
        $ModelsContrat->contrats_type_id=$request->input('contrats_type_id');
        $ModelsContrat->contenu=$request->input('contenu');
        $ModelsContrat->save();
        return redirect(route('entreprise.models-contrat.liste'))->with('success', "Modèle de contrat modifié avec succès !");
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

            $PageName = "Modification du modèle de contrats";
            $ModelsContrat = ContratsModel::find($id);
            $TypesContrats = ContratsType::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.contrats.models.edit', compact('TypesContrats', 'ModelsContrat', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $PageName = "Modification du modèle de contrats";
        $ModelsContrat = ContratsModel::find($id);
        $TypesContrats = ContratsType::where('entreprise_id', Auth::user()->entreprise_id)->get();
        return view('entreprise.contrats.models.edit', compact('TypesContrats', 'ModelsContrat', 'PageName', 'Session'));

        }

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nom'=>'required',
            'contrats_type_id'=>'required',
            'contenu'=>'required',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $ModelsContrat =  ContratsModel::find($id);
        $ModelsContrat->entreprise_id=$EntrepriseID;
        $ModelsContrat->nom=$request->input('nom');
        $ModelsContrat->contrats_type_id=$request->input('contrats_type_id');
        $ModelsContrat->contenu=$request->input('contenu');
        $ModelsContrat->update();
        return redirect(route('entreprise.models-contrat.liste'))->with('success', "Modèle de contrat modifié avec succès !");
    }



    public function destroy($id)
    {
       ContratsModel::find($id)->delete();
       return redirect(route('entreprise.models-contrat.liste'))->with('success', "Modèle de contrat suprimé avec succeès");
    }
}
