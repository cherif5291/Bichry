<?php

use App\Mail\Bienvenue;
use App\Mail\Invitation;
use App\Mail\Notification;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\DevisesMonetaire;
use App\Models\Entreprise;
use App\Models\Fournisseur;
use App\Models\Langue;
use App\Models\SessionControl;
use App\Models\Taxe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

function getInfosSystem() {
    return \App\Models\InfosSystem::find(1);
}

function getControls() {
    return \App\Models\Control::where('entreprise_id', Auth::user()->entreprise_id)->get();
}
function getEntreprises() {
    return \App\Models\Entreprise::all();
}

function getPays() {
    return DB::table('pays')->get();
}

function getPackages() {
    return \App\Models\Package::all();
}

function getPreloader() {
    return \App\Models\SessionControl::all();
}

function getWebsite() {
    return \App\Models\Website::find(1);
}

function getUsers() {
    return \App\Models\User::all();
}

function Clients() {
    return ClientsEntreprise::all();
}

function Fournisseurs() {
    return Fournisseur::all();
}

function getAbonnements() {
    return \App\Models\Abonnement::all();
}




// function getReglements() {
//     return \App\Models\Reglement::all();
// }


function getUserLangage() {
    return \App\Models\Langue::where('id', auth()->user()->langue_id)->get();
}

function getDeviseMonnaitaire() {
    $devise = \App\Models\Entreprise::where('user_id', auth()->user()->id)->get('devises_monetaire_id');
    return \App\Models\DevisesMonetaire::where('id', $devise);
}

function sendNotificationMail(String $email,  $intitule, String $description, String $btn_lien_utile, String $link_lien_utile, String $attachement, String $objet, $Facture) {
    try {
        Mail::to($email)
            ->send(new Notification($intitule, $description, $btn_lien_utile, $link_lien_utile, $attachement, $objet, $Facture));
    } catch (\Throwable $th) {
        dd($th);
    }
}

function sendWelcomeMail(String $email,  $data, String $objet,) {
    try {
        Mail::to($email)
            ->send(new Bienvenue($data, $objet));
    } catch (\Throwable $th) {
        dd($th);
    }
}

function sendInvitation(String $email,  $data, String $objet,) {
    try {
        Mail::to($email)
            ->send(new Invitation($data, $objet));
    } catch (\Throwable $th) {
        dd($th);
    }
}


function getLang()
{
   return Langue::find(Auth::user()->langue_id);
}
function getCurrency()
    {
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =Auth::user()->entreprise_id;
        }
        $currency_id = Entreprise::find($EntrepriseID)->devises_monetaire_id;
        $currency = DevisesMonetaire::find($currency_id);
       return $currency;
    }

function formatpriceth($price, $currency)
{
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    $currency_id = Entreprise::find($EntrepriseID)->devises_monetaire_id;
    $currency = DevisesMonetaire::find($currency_id);
    if ($currency->swap_currency_symbol == 1) {
        return $currency->sigle ." ". number_format(floatval($price), $currency->precision, $currency->decimal_separator, $currency->thousand_separator);
    }
    if ($currency->swap_currency_symbol == 0) {
        return number_format(floatval($price), $currency->precision, $currency->decimal_separator, $currency->thousand_separator)." ".$currency->sigle;
    }
}



function getFactures() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\Facture::where('entreprise_id', $EntrepriseID)->get();
}

function getCompanyInfo() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return Entreprise::find($EntrepriseID);
}

function getPlanComptable() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return Comptescomptable::all();
}

function getComptesComptables() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
}


function getTaxes() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return Taxe::all();
}

function getAuthByControl()
{
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    $Entreprise = Entreprise::find($EntrepriseID);
   return User::find($Entreprise->user_id);
}


function getReglements() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\Reglement::where('entreprise_id', $EntrepriseID)->get();
}

function getArticles() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\Article::where('entreprise_id', $EntrepriseID)->get();
}


function getClients() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
}

function getFournisseurs() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\Fournisseur::where('entreprise_id', $EntrepriseID)->get();
}

function getEmployes() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\EmployesEntreprise::where('entreprise_id', $EntrepriseID)->get();
}

function getToday() {

    return Carbon::now()->format('Y-m-d');
}

function getReglementsM() {
    if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
    }else {
        $EntrepriseID =Auth::user()->entreprise_id;
    }
    return \App\Models\Reglement::where('entreprise_id', $EntrepriseID)->whereMonth('created_id', Carbon::now()->month)->get();
}




