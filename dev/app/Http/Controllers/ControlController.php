<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Entreprise;
use App\Models\SessionControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newSessionControl($id)
    {
        if (SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->get()) {
            $OldSession = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->get();
            for ($i=0; $i < $OldSession->count(); $i++) {
                $SessionOut = SessionControl::find($OldSession[$i]->id);
                $SessionOut->status = "expired";
                $SessionOut->ended = Carbon::now();
                $SessionOut->update();
            }
        }
        $Session = new SessionControl();
        $Session->entreprise_id = Auth::user()->entreprise_id;
        $Session->control_id = $id;
        $Session->started = Carbon::now();
        $Session->preloader = "yes";
        $Session->save();
        $Entreprise = Entreprise::find(Control::find($id)->entreprise_controled_id);
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            //data
            $PageName = "Tableau de bord";
            $Session = 1;
            return view('entreprise.preloader', compact('PageName', 'Session'))->with('success', "Préparation de votre l'espace de travail avec l'entreprise ".$Entreprise->nom_entreprise." encours. Veuillez patientez.");
        }

    }

    public function newSessionControlRedirect()
    {
        if (SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $Session->preloader = "no";
            $Session->update();
        }
        return redirect(route('entreprise'))->with('success', "Vous avez ouvert une session d'administration comptable avec succès.");
    }

    public function endSessionControl()
    {
        if (SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $Session->status = "expired";
            $Session->ended = Carbon::now();
            $Session->update();
            $Entreprise = Entreprise::find(Control::find($Session->control_id)->entreprise_controled_id);
            return redirect(route('entreprise'))->with('success', "Vous avez fermer la session d'administration comptable ouvert depuis: ".$Session->started." avec succès sur l'entreprise ".$Entreprise->nom_entreprise.".");
        }else {
            return redirect(route('entreprise'))->with('error', "Aucune session de control Comptable ouverte");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show(Control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        //
    }
}
