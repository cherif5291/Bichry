<?php

namespace App\Http\Controllers;

use App\Models\Reglement;
use App\Models\Facture;
use App\Models\Abonnement;
use App\Models\ClientsEntreprise;
use App\Models\Control;
use App\Models\Depense;
use App\Models\Entreprise;
use App\Models\Langue;
use App\Models\ModulePack;
use App\Models\Package;
use App\Models\Reglement as ModelsReglement;
use App\Models\SessionControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Backoffice extends Controller
{
    public function index()
    {


        $year = Carbon::now()->format('Y');

        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            //data
            $PageName = "Tableau de bord";
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
            $Entreprise = Entreprise::find($EntrepriseID);
            $Reglements = Reglement::all();
            $Depenses = Depense::where('entreprise_id',$EntrepriseID)->get();
            $Factures = Facture::where('entreprise_id', $EntrepriseID)->get();

            $Dm01 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
            $Dm02 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
            $Dm03 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
            $Dm04 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
            $Dm05 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
            $Dm06 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
            $Dm07 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
            $Dm08 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
            $Dm09 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
            $Dm10 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
            $Dm11 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
            $Dm12 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');


            $Fm01 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
            $Fm02 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
            $Fm03 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
            $Fm04 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
            $Fm05 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
            $Fm06 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
            $Fm07 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
            $Fm08 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
            $Fm09 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
            $Fm10 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
            $Fm11 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
            $Fm12 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');

            $today = Carbon::now()->format('Y-m-d');

            // $FM = json_encode([$Fm01??0,$Fm02??0,$Fm03??0,$Fm04??0,$Fm05??0,$Fm06??0,$Fm07??0,$Fm08??0,$Fm09??0,$Fm10??0,$Fm11??0,$Fm12??0]);
            // $DM = json_encode([$Dm01??0,$Dm02??0,$Dm03??0,$Dm04??0,$Dm05??0,$Dm06??0,$Dm07??0,$Dm08??0,$Dm09??0,$Dm10??0,$Dm11??0,$Dm12??0]);
            $RecuC = Facture::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "recu")->count();
            $FactureC = Facture::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "facture")->count();
            $DFactureC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "facture")->count();
            $DChequeC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "cheque")->count();
            $DCreditC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "credit")->count();
            $DDepenseC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "depense")->count();

            $DayCollected = Reglement::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->where('created_at',  $today)->sum('montant_recu');
            $MonthCollected = Reglement::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at',  Carbon::now()->format('m'))->sum('montant_recu');



            $dataPoints1 = array(
                array("label"=> __('messages.jan'), "y"=> $Dm01 ),
                array("label"=> __('messages.fev'), "y"=> $Dm02 ),
                array("label"=> __('messages.mar'), "y"=> $Dm03 ),
                array("label"=> __('messages.apr'), "y"=> $Dm04 ),
                array("label"=> __('messages.may'), "y"=> $Dm05 ),
                array("label"=> __('messages.jun'), "y"=> $Dm06 ),
                array("label"=> __('messages.jul'), "y"=> $Dm07 ),
                array("label"=> __('messages.aug'), "y"=> $Dm08 ),
                array("label"=> __('messages.sept'), "y"=> $Dm09 ),
                array("label"=> __('messages.oct'), "y"=> $Dm10 ),
                array("label"=> __('messages.nov'), "y"=> $Dm11 ),
                array("label"=> __('messages.dec'), "y"=> $Dm12 ),

            );


            $dataPoints2 = array(
                array("label"=> __('messages.jan'), "y"=> $Fm01 ),
                array("label"=> __('messages.fev'), "y"=> $Fm02 ),
                array("label"=> __('messages.mar'), "y"=> $Fm03 ),
                array("label"=> __('messages.apr'), "y"=> $Fm04 ),
                array("label"=> __('messages.may'), "y"=> $Fm05 ),
                array("label"=> __('messages.jun'), "y"=> $Fm06 ),
                array("label"=> __('messages.jul'), "y"=> $Fm07 ),
                array("label"=> __('messages.aug'), "y"=> $Fm08 ),
                array("label"=> __('messages.sept'), "y"=> $Fm09 ),
                array("label"=> __('messages.oct'), "y"=> $Fm10 ),
                array("label"=> __('messages.nov'), "y"=> $Fm11 ),
                array("label"=> __('messages.dec'), "y"=> $Fm12 ),
            );

            return view('entreprise.dashboard', compact('dataPoints1','dataPoints2','DayCollected', 'MonthCollected',  'RecuC', 'FactureC', 'DFactureC', 'DChequeC', 'DCreditC', 'DDepenseC','PageName', 'Session', 'Factures', 'Depenses', 'Entreprise', 'Reglements'));
        } else {
            $PageName = "Tableau de bord";
            $Session = 0;
            $Entreprise = Auth::user()->entreprise;
            $Reglements = Reglement::all();
            $Depenses = Depense::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Factures = Facture::where('entreprise_id', Auth::user()->entreprise_id)->get();


            $EntrepriseID = Auth::user()->entreprise_id;
            $Dm01 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
            $Dm02 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
            $Dm03 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
            $Dm04 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
            $Dm05 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
            $Dm06 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
            $Dm07 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
            $Dm08 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
            $Dm09 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
            $Dm10 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
            $Dm11 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
            $Dm12 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');


            $Fm01 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
            $Fm02 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
            $Fm03 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
            $Fm04 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
            $Fm05 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
            $Fm06 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
            $Fm07 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
            $Fm08 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
            $Fm09 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
            $Fm10 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
            $Fm11 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
            $Fm12 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');

            $today = Carbon::now()->format('Y-m-d');

            // $FM = json_encode([$Fm01??0,$Fm02??0,$Fm03??0,$Fm04??0,$Fm05??0,$Fm06??0,$Fm07??0,$Fm08??0,$Fm09??0,$Fm10??0,$Fm11??0,$Fm12??0]);
            // $DM = json_encode([$Dm01??0,$Dm02??0,$Dm03??0,$Dm04??0,$Dm05??0,$Dm06??0,$Dm07??0,$Dm08??0,$Dm09??0,$Dm10??0,$Dm11??0,$Dm12??0]);
            $RecuC = Facture::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "recu")->count();
            $FactureC = Facture::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "facture")->count();
            $DFactureC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "facture")->count();
            $DChequeC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "cheque")->count();
            $DCreditC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "credit")->count();
            $DDepenseC = Depense::where('entreprise_id',$EntrepriseID)->where('created_at',  $today)->where('type', "depense")->count();

            $DayCollected = Reglement::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->where('created_at',  $today)->sum('montant_recu');
            $MonthCollected = Reglement::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at',  Carbon::now()->format('m'))->sum('montant_recu');


            $dataPoints1 = array(
                array("label"=> __('messages.jan'), "y"=> $Dm01 ),
                array("label"=> __('messages.fev'), "y"=> $Dm02 ),
                array("label"=> __('messages.mar'), "y"=> $Dm03 ),
                array("label"=> __('messages.apr'), "y"=> $Dm04 ),
                array("label"=> __('messages.may'), "y"=> $Dm05 ),
                array("label"=> __('messages.jun'), "y"=> $Dm06 ),
                array("label"=> __('messages.jul'), "y"=> $Dm07 ),
                array("label"=> __('messages.aug'), "y"=> $Dm08 ),
                array("label"=> __('messages.sept'), "y"=> $Dm09 ),
                array("label"=> __('messages.oct'), "y"=> $Dm10 ),
                array("label"=> __('messages.nov'), "y"=> $Dm11 ),
                array("label"=> __('messages.dec'), "y"=> $Dm12 ),

            );


            $dataPoints2 = array(
                array("label"=> __('messages.jan'), "y"=> $Fm01 ),
                array("label"=> __('messages.fev'), "y"=> $Fm02 ),
                array("label"=> __('messages.mar'), "y"=> $Fm03 ),
                array("label"=> __('messages.apr'), "y"=> $Fm04 ),
                array("label"=> __('messages.may'), "y"=> $Fm05 ),
                array("label"=> __('messages.jun'), "y"=> $Fm06 ),
                array("label"=> __('messages.jul'), "y"=> $Fm07 ),
                array("label"=> __('messages.aug'), "y"=> $Fm08 ),
                array("label"=> __('messages.sept'), "y"=> $Fm09 ),
                array("label"=> __('messages.oct'), "y"=> $Fm10 ),
                array("label"=> __('messages.nov'), "y"=> $Fm11 ),
                array("label"=> __('messages.dec'), "y"=> $Fm12 ),
            );

            return view('entreprise.dashboard', compact('dataPoints1','dataPoints2','DayCollected', 'MonthCollected',  'RecuC', 'FactureC', 'DFactureC', 'DChequeC', 'DCreditC', 'DDepenseC','PageName', 'Session', 'Factures', 'Depenses', 'Entreprise', 'Reglements'));
        }
    }

    public function overview()
    {
        $year = Carbon::now()->format('Y');
        $lastYear = $year-1;
        $lastYear= (string)$lastYear;

        $Years = json_encode([3424,643]);

        // dd($lastYear);
        $PageName = __('messages.company_overview');
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Dm01 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
        $Dm02 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
        $Dm03 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
        $Dm04 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
        $Dm05 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
        $Dm06 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
        $Dm07 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
        $Dm08 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
        $Dm09 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
        $Dm10 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
        $Dm11 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
        $Dm12 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');

        $DmA = json_encode([$Dm01??0,$Dm02??0,$Dm03??0,$Dm04??0,$Dm05??0,$Dm06??0,$Dm07??0,$Dm08??0,$Dm09??0,$Dm10??0,$Dm11??0,$Dm12??0]);

        $ODm01 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 1)->sum('total');
        $ODm02 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 2)->sum('total');
        $ODm03 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 3)->sum('total');
        $ODm04 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 4)->sum('total');
        $ODm05 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 5)->sum('total');
        $ODm06 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 6)->sum('total');
        $ODm07 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 7)->sum('total');
        $ODm08 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 8)->sum('total');
        $ODm09 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 9)->sum('total');
        $ODm10 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 10)->sum('total');
        $ODm11 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 11)->sum('total');
        $ODm12 = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 12)->sum('total');

        $ODmA = json_encode([$ODm01??0,$ODm02??0,$ODm03??0,$ODm04??0,$ODm05??0,$ODm06??0,$ODm07??0,$ODm08??0,$ODm09??0,$ODm10??0,$ODm11??0,$ODm12??0]);
        // dd($ODmA);

        $Fm01 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 1)->sum('total');
        $Fm02 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 2)->sum('total');
        $Fm03 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 3)->sum('total');
        $Fm04 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 4)->sum('total');
        $Fm05 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 5)->sum('total');
        $Fm06 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 6)->sum('total');
        $Fm07 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 7)->sum('total');
        $Fm08 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 8)->sum('total');
        $Fm09 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 9)->sum('total');
        $Fm10 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 10)->sum('total');
        $Fm11 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 11)->sum('total');
        $Fm12 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->whereMonth('created_at', 12)->sum('total');
        $FmA = json_encode([$Fm01??0,$Fm02??0,$Fm03??0,$Fm04??0,$Fm05??0,$Fm06??0,$Fm07??0,$Fm08??0,$Fm09??0,$Fm10??0,$Fm11??0,$Fm12??0]);

        $OFm01 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 1)->sum('total');
        $OFm02 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 2)->sum('total');
        $OFm03 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 3)->sum('total');
        $OFm04 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 4)->sum('total');
        $OFm05 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 5)->sum('total');
        $OFm06 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 6)->sum('total');
        $OFm07 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 7)->sum('total');
        $OFm08 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 8)->sum('total');
        $OFm09 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 9)->sum('total');
        $OFm10 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 10)->sum('total');
        $OFm11 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 11)->sum('total');
        $OFm12 = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $lastYear)->whereMonth('created_at', 12)->sum('total');
        $OFmA = json_encode([$OFm01??0,$OFm02??0,$OFm03??0,$OFm04??0,$OFm05??0,$OFm06??0,$OFm07??0,$OFm08??0,$OFm09??0,$OFm10??0,$OFm11??0,$OFm12??0]);

        $DepensesA = Depense::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->sum('total');
        $RevenuesA = Facture::where('entreprise_id',$EntrepriseID)->whereYear('created_at', '=', $year)->sum('total');
        $chartIncomesExpensesData  = json_encode([$DepensesA, $RevenuesA]);
        $chartPieMesDepensesData = json_encode([424,843]);
        $chartIncomesExpensesLabel = json_encode([__('messages.incomes'),__('messages.expenses')]);
// dd($chartIncomesExpensesData);

        return view('entreprise.rapports.performance.overview', compact('PageName', 'DmA', 'ODmA','FmA', 'OFmA',  'Years', 'chartIncomesExpensesData', 'chartPieMesDepensesData', 'chartIncomesExpensesLabel'));
    }

    public function monCompte()
    {
        return view('entreprise.compte.profile');
    }

    public function mesEmails()
    {
        return view('entreprise.compte.emails');
    }

    public function motDePasse()
    {
        return view('entreprise.compte.motdepasse');
    }

    public function activation($id)
    {
        $User = User::find($id);
        return view('activation', compact('User'));
    }
    public function sendActivattion($id)
    {
        $objet = __('messages.activation'). " | BilanPro";
        $text1 = "Bienvenue sur BilanPro";
        $text2 = "Pour plus de sécurité, validez d’abord votre adresse email avant d’utiliser notre plateforme. Cliquez au lien suivant :";
        $LINK= route('activate',[$id, Str::slug(User::find($id)->prenom.User::find($id)->nom)]);

        $Thank= "Merci";
        $Team= "L’équipe de BilanPro";
        $text3 = "Si vous avez des questions, vous pouvez simplement répondre à cet e-mail ou trouver nos coordonnées ci-dessous.
        Contactez-nous également sur :";
        $data = array($text1, $text2,  $LINK, $Thank, $Team, $text3);
        sendWelcomeMail(User::find($id)->email, $data, $objet,);
        return back()->with('success',__('messages.activation_email_sent'));
    }

    public function activate($id)
    {
        $User = User::find($id);
        $User->activation = "valide";
        $User->update();
        return redirect(route('login'))->with('success', "Votre compte a bien été activé. vous pouvez à présent vous connectez.");
    }

    //clients






}
