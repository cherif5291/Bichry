<?php

use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\CategoriesArticle;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\Depense;
use App\Models\DepensesPanier;
use App\Models\DevisesMonetaire;
use App\Models\Fournisseur;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\Paiementsource;
use App\Models\SessionControl;
use App\Models\Taxe;
use App\Models\Reglement as ModelsReglement;
use Illuminate\Support\Facades\Crypt;


if (!function_exists('getDepenseById')) {
    function getDepenseById($id)
    {
        $Depense = Depense::with([
            'facture',
            'depensesPaniers',
            'fournisseur',
            'cheque',
            'depensesSimple',
            'creditFournisseurs',
            'piecesJointes',
        ])->where('id', $id)->first();

        return $Depense;
    }
}

if (!function_exists('getArticlesbyID')) {
    function getArticlesbyID($idArticle)
    {
        $art =[
          'Article' => Article::where('id', $idArticle)->get(),
        ];
        return $art;
    }
}



if (!function_exists('getUserSession')) {
    function getUserSession()
    {
        $Session = SessionControl::where([
            ['entreprise_id', auth()->user()->entreprise_id],
            ['status', "valide"]
        ])->first();

        return $Session;
    }
}

if (!function_exists('getDepenseDataBySession')) {
    function getDepenseDataBySession()
    {
        $Session = getUserSession();

        if (auth()->user()->role == "cabinet" && $Session) {
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            $data = [
                'Depenses' => Depense::where('entreprise_id', $EntrepriseID)->get(),
                'Clients' => ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get(),
                'Fournisseurs' => Fournisseur::where('entreprise_id', $EntrepriseID )->latest()->get(),
                'Articles' => Article::where('entreprise_id', $EntrepriseID)->get(),
                'Modalites' => PaiementsModalite::where('entreprise_id', $EntrepriseID)->get(),
                'Taxes' => Taxe::where('entreprise_id', $EntrepriseID)->get(),
                'DevisesMonetaires' => DevisesMonetaire::all(),
                'ComptesComptables' => Comptescomptable::where('entreprise_id', $EntrepriseID)->get(),
                'ComptesComptablesDefault' => Comptescomptable::orderBy('numero_compte', 'asc')->get(),
                'DepensePaniers' => DepensesPanier::where('entreprise_id', $EntrepriseID )->get(),
                'ModesPaiements' => PaiementsMode::where('entreprise_id', $EntrepriseID)->get(),
                'SourcesPaiement' => Paiementsource::where('entreprise_id', $EntrepriseID)->get(),
                'ComptePayement' => Paiementsource::where('type','cpt_paiement')->get(),
                'Banques' => Banque::where('entreprise_id', $EntrepriseID)->get(),
                'Caisses' => Caisse::where('entreprise_id', $EntrepriseID)->get(),
                'Categories' => CategoriesArticle::where('entreprise_id',$EntrepriseID)->get(),
                'Reglements' => ModelsReglement::all(),
            ];
            if (isset($_GET['filtre'])) {
              if (isset($_GET['fournisseur_id']) && !empty($_GET['fournisseur_id'])) {
                $fournisseur_id = decrypt($_GET['fournisseur_id']);
                $data += [
                  'DepensesFiltre' => Depense::where('entreprise_id', $EntrepriseID)
                                              ->where('fournisseur_id', $fournisseur_id)
                                              ->where('created_at','>=', $_GET['date_debut'])
                                              ->where('created_at','<=', $_GET['date_fin'])
                                              ->get(),
                  ] ;
              }
              else {
                $data += [
                  'DepensesFiltre' => Depense::where('entreprise_id', $EntrepriseID)
                                              ->where('created_at','>=', $_GET['date_debut'])
                                              ->where('created_at','<=', $_GET['date_fin'])
                                              ->get(),
                  ] ;
              }
            }

        } else {
            $Session = 0;
            $data = [
                'Depenses' => Depense::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Clients' => ClientsEntreprise::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Fournisseurs' => Fournisseur::where('entreprise_id', auth()->user()->entreprise_id )->latest()->get(),
                'Articles' => Article::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Modalites' => PaiementsModalite::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Taxes' => Taxe::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'DevisesMonetaires' => DevisesMonetaire::all(),
                'ComptesComptables' => Comptescomptable::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'ComptesComptablesDefault' => Comptescomptable::orderBy('numero_compte', 'asc')->get(),
                'ModesPaiements' => PaiementsMode::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'DepensePaniers' => DepensesPanier::where('entreprise_id', auth()->user()->entreprise_id )->get(),
                'SourcesPaiement' => Paiementsource::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'ComptePayement' => Paiementsource::where('type','cpt_paiement')->get(),
                'Banques' => Banque::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Caisses' => Caisse::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Categories' => CategoriesArticle::where('entreprise_id', auth()->user()->entreprise_id)->get(),
            ];
            if (isset($_GET['filtre'])) {
              if (isset($_GET['fournisseur_id']) && !empty($_GET['fournisseur_id'])) {
                $fournisseur_id = decrypt($_GET['fournisseur_id']);
                $data += [
                  'DepensesFiltre' => Depense::where('entreprise_id', auth()->user()->entreprise_id)
                                              ->where('fournisseur_id', $fournisseur_id)
                                              ->where('created_at','>=', $_GET['date_debut'])
                                              ->where('created_at','<=', $_GET['date_fin'])
                                              ->get(),
                  ] ;
              }
              else {
                $data += [
                  'DepensesFiltre' => Depense::where('entreprise_id', auth()->user()->entreprise_id)
                                              ->where('created_at','>=', $_GET['date_debut'])
                                              ->where('created_at','<=', $_GET['date_fin'])
                                              ->get(),
                  ] ;
              }
            }
        }

        return $data;
    }
}
