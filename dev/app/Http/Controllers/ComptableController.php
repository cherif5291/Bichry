<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\SessionControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComptableController extends Controller
{

    function index()
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

            $PageName = "Mon Comptable";
            return view('entreprise.comptable.index', compact('PageName','Session'));
        } else {
            $Session = 0;

            $PageName = "Mon Comptable";
            return view('entreprise.comptable.index', compact('PageName', 'Session'));
        }

    }
}
