<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
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

        $PageName = "Rapports";
      return view('entreprise.rapports.standard.index', compact('PageName', 'Session'));
    } else {
        $Session = 0;

        $PageName = "Rapports";
        return view('entreprise.rapports.standard.index', compact('PageName', 'Session'));

    }

   }

   public function performances()
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

        $PageName = "Centre de performances";
      return view('entreprise.rapports.performance.index', compact('PageName','Session'));
    } else {
        $Session = 0;

        $PageName = "Centre de performances";
      return view('entreprise.rapports.performance.index', compact('PageName','Session'));

    }

   }
}
