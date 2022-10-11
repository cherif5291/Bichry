<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Requests\CaisseStoreRequest;
use App\Http\Requests\CaisseUpdateRequest;
use App\Models\Banque;
use App\Models\Control;
use App\Models\SessionControl;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CaisseController extends Controller
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

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.finances.index', compact('PageName', 'Caisses', 'Banques', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Banques = Banque::where('entreprise_id', Auth::user()->entreprise_id)->get();
            return view('entreprise.finances.index', compact('PageName', 'Caisses', 'Banques', 'Session'));

        }

    }

    public function banque($id)
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

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            $Banque = Banque::find($id);
            $Transactions = Transaction::where('banque_id', $id)->get();
            $Today = Carbon::today()->toDateString();
            return view('entreprise.finances.banque', compact('PageName', 'Caisses', 'Banques','Banque', 'Transactions', 'Today', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Banques = Banque::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Banque = Banque::find($id);
            $Transactions = Transaction::where('banque_id', $id)->get();
            $Today = Carbon::today()->toDateString();
            return view('entreprise.finances.banque', compact('PageName', 'Caisses', 'Banques','Banque', 'Transactions', 'Today', 'Session'));

        }

    }

    public function caisse($id)
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

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            $Caisse = Caisse::find($id);
            $Transactions = Transaction::where('caisse_id', $id)->get();
            $Today = Carbon::today()->toDateString();
        return view('entreprise.finances.caisse', compact('PageName', 'Caisses', 'Banques','Caisse', 'Transactions', 'Today', 'Session'));
        } else {
            $Session = 0;

            $PageName = "Banque & Caisse";
            $Caisses = Caisse::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Banques = Banque::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Caisse = Caisse::find($id);
            $Transactions = Transaction::where('caisse_id', $id)->get();
            $Today = Carbon::today()->toDateString();
            return view('entreprise.finances.caisse', compact('PageName', 'Caisses', 'Banques','Caisse', 'Transactions', 'Today','Session'));

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

            $search = $request->get('search', '');
            $PageName = 'Ajout Caisse';
            $caisses = Caisse::search($search)
                ->where('entreprise_id', $EntrepriseID)
                ->latest()
                ->paginate(5);

            return view('entreprise.caisse.create', compact('PageName', 'caisses', 'Session'));
        } else {
            $Session = 0;

            $search = $request->get('search', '');
            $PageName = 'Ajout Caisse';
            $caisses = Caisse::search($search)
                ->where('entreprise_id', auth()->user()->entreprise_id)
                ->latest()
                ->paginate(5);

            return view('entreprise.caisse.create', compact('PageName', 'caisses', 'Session'));

        }

    }

    /**
     * @param \App\Http\Requests\CaisseStoreRequest $request
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
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

                //$this->authorize('update', $caisse);
            $caisse = Caisse::find($id);
            $search = $request->get('search', '');
            $PageName = 'Modification Caisse';
            $caisses = Caisse::search($search)
                ->where('entreprise_id', $EntrepriseID)
                ->latest()
                ->paginate(5);
            //dd($caisse);
            return view('entreprise.caisse.edit', compact('caisse', 'caisses', 'PageName', 'Session'));
        } else {
            $Session = 0;

             //$this->authorize('update', $caisse);
            $caisse = Caisse::find($id);
            $search = $request->get('search', '');
            $PageName = 'Modification Caisse';
            $caisses = Caisse::search($search)
                ->where('entreprise_id', auth()->user()->entreprise_id)
                ->latest()
                ->paginate(5);
            //dd($caisse);
            return view('entreprise.caisse.edit', compact('caisse', 'caisses', 'PageName', 'Session'));

        }

    }

    /**
     * @param \App\Http\Requests\CaisseUpdateRequest $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(CaisseUpdateRequest $request,$id)
    {
        //$this->authorize('update', $caisse);
        $caisse = Caisse::find($id);
        $validated = $request->validated();
        $validated['entreprise_id'] = auth()->user()->entreprise_id ;
        $caisse->update($validated);

        return back()->withSuccess(__('Caisse modifier avec succès'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Caisse $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Caisse $caisse)
    {
        //$this->authorize('delete', $caisse);

        $caisse->delete();

        return back()->withSuccess(__('Caisse supprimer avec succès'));
    }
}
