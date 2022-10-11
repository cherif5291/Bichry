<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\Entreprise;
use App\Models\InfosSystem;
use App\Models\Log;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function general()
    {
       $InfosSystem = InfosSystem::find(1);
       $PageName = "Parametres application";
       $Is_selected = 1;
       return view('admin.parametres.general.update', compact('InfosSystem', 'Is_selected'));
    }

    public function paiements()
    {
       $InfosSystem = InfosSystem::find(1);
       $PageName = "Parametres moyens de paiements";
       return view('admin.parametres.paiements', compact('InfosSystem', 'PageName'));
    }

    public function activites()
    {
       $InfosSystem = InfosSystem::find(1);
       $PageName = "Journal d'activites";
       return view('admin.parametres.activites', compact('InfosSystem', 'PageName'));
    }

    public function abonnements()
    {
       $InfosSystem = InfosSystem::find(1);
    //    $Logs = Log::all();
       $PageName = "Parametres d'abonnements";
       $Abonnements = Abonnement::all();
       //return $Abonnements;
       return view('admin.parametres.abonnements.index', compact('InfosSystem', 'PageName', 'Abonnements'));
    }

    public function abonnementshow($id)
    {
       $InfosSystem = InfosSystem::find(1);
    //    $Logs = Log::all();
       $PageName = "Parametres d'abonnements";
       $Abonnement = Abonnement::find($id);
       $Abonnements = Abonnement::all();
       $Entreprise = Entreprise::find($Abonnement->entreprise_id);
       $Paiements = PackagePayment::where('abonnement_id', $id)->where('montant', '>', 0)->get();
       //return $Abonnements;
       $Users = User::where('entreprise_id',$Abonnement->entreprise_id )->get();
       return view('admin.parametres.abonnements.show', compact('InfosSystem', 'PageName', 'Entreprise', 'Abonnements', 'Users', 'Paiements'));
    }

    public function entreprises()
    {
       $Clients = Entreprise::where('type', 'entreprise')->get();
       $PageName = "Liste des entreprises";
       return view('admin.parametres.entreprises.index', compact('Clients', 'PageName'));
    }

    public function entrepriseDossier($id)
    {
       
       $Entreprise = Entreprise::find($id);
       $PageName = "Détails d'entreprise";
       $InfosSystem = InfosSystem::find(1);
       $Users = User::where('entreprise_id',$id )->get();
       return view('admin.parametres.entreprises.show', compact('InfosSystem', 'PageName', 'Entreprise', 'Users'));
    }

    public function entrepriseEdit($id)
    {
    
           
        $Entreprise = Entreprise::find($id);
        $EntrepriseID = $id;
        $PageName = "Modification infos client";
        $DevisesMonetaires = DevisesMonetaire::all();
        $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
        $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
        $ModalitePaiements = PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();

        return view('admin.parametres.entreprises.edit', compact('Entreprise' , 'PageName', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements', 'ModalitePaiements'));


    }



    public function cabinets()
    {
       $Clients = Entreprise::where('type', 'cabinet')->get();
       $PageName = "Liste des cabinets";
       return view('admin.parametres.cabinets.index', compact('Clients', 'PageName'));
    }


}
