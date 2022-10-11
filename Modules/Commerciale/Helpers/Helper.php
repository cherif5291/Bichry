<?php

use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\CategoriesArticle;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\DevisesMonetaire;
use App\Models\Facture;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\Paiementsource;
use App\Models\SessionControl;
use App\Models\Taxe;
use App\Models\Reglement as ModelsReglement;

if (!function_exists('getFactureById')) {
    function getFactureById($id)
    {
        $Facture = Facture::with([
            'depensesPaniers',
            'clientsEntreprise',
            'paiementsModalite',
            'piecesJointes',
            'reglements',
        ])->where('id', $id)->first();

        return $Facture;
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

if (!function_exists('getDataBySession')) {
    function getDataBySession()
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
                'Factures' => Facture::where('entreprise_id', $EntrepriseID)->get(),
                'Clients' => ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get(),
                'Articles' => Article::where('entreprise_id', $EntrepriseID)->get(),
                'Modalites' => PaiementsModalite::where('entreprise_id', $EntrepriseID)->get(),
                'Taxes' => Taxe::where('entreprise_id', $EntrepriseID)->get(),
                'DevisesMonetaires' => DevisesMonetaire::all(),
                'ComptesComptables' => Comptescomptable::where('entreprise_id', $EntrepriseID)->get(),
                'ComptesComptablesdefault' => Comptescomptable::all(),
                'ModesPaiements' => PaiementsMode::where('entreprise_id', $EntrepriseID)->get(),
                'SourcesPaiement' => Paiementsource::where('entreprise_id', $EntrepriseID)->get(),
                'Banques' => Banque::where('entreprise_id', $EntrepriseID)->get(),
                'Caisses' => Caisse::where('entreprise_id', $EntrepriseID)->get(),
                'Categories' => CategoriesArticle::where('entreprise_id',$EntrepriseID)->get(),
                'Reglements' => ModelsReglement::all(),
            ];

        } else {
            $Session = 0;
            $data = [
                'Factures' => Facture::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Clients' => ClientsEntreprise::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Articles' => Article::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Modalites' => PaiementsModalite::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Taxes' => Taxe::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'DevisesMonetaires' => DevisesMonetaire::all(),
                'ComptesComptables' => Comptescomptable::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'ComptesComptablesDefault' => Comptescomptable::all(),
                'ModesPaiements' => PaiementsMode::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'SourcesPaiement' => Paiementsource::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Banques' => Banque::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Caisses' => Caisse::where('entreprise_id', auth()->user()->entreprise_id)->get(),
                'Categories' => CategoriesArticle::where('entreprise_id', auth()->user()->entreprise_id)->get(),
            ];
        }

        return $data;
    }
}
