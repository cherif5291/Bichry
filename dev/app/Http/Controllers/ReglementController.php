<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Facture;
use App\Models\Reglement;
use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Models\ClientsEntreprise;
use App\Http\Requests\ReglementStoreRequest;
use App\Http\Requests\ReglementUpdateRequest;
use App\Models\Control;
use App\Models\Paiementsource;
use App\Models\SessionControl;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ReglementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Reglement::class);

        $search = $request->get('search', '');

        $reglements = Reglement::search($search)
            ->latest()
            ->paginate(5);

        return view('app.reglements.index', compact('reglements', 'search'));
    }

    public function reglementFacture(Request $request)
    {


        $nature = substr_replace($request->input('paiement_source') ?? "", "", 1);
        $indice = (int) filter_var($request->input('paiement_source'), FILTER_SANITIZE_NUMBER_INT);

        if(Facture::find($request->id)){
            $facture = Facture::find($request->id);

            $Reglement = new Reglement();
            $Reglement->clients_entreprise_id = $facture->clients_entreprise_id;
            $Reglement->facture_id = $facture->id;
            $Reglement->cc_cci = $facture->cc_cci;
            $Reglement->paiements_mode_id = $facture->paiements_mode_id;
            $Reglement->montant_recu = $request->montant;
            $Reglement->note = $request->note;
            $EntrepriseID = 0;
            if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
                $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
                $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;

            } else {
                $EntrepriseID = Auth::user()->entreprise_id;
            }
            $Reglement->entreprise_id = $EntrepriseID;
            if($facture->type == "facture"){
                $motif = "Paiement facture N°".$facture->numero_facture;
                $Reglement->reference = $facture->numero_facture;
            }elseif($facture->type == "recu"){
                $motif = "Paiement Reçu N°".$facture->numero_recu;
                $Reglement->reference = $facture->numero_recu;
            }

            if ($nature == "B") {
                // Reglement table
                $banque = Banque::where([['id', $indice], ['entreprise_id', auth()->user()->entreprise_id]])->first();
                $Reglement->approvisionnememnt = $banque->nom;
                $Reglement->banque_id = $indice;
                $Reglement->caisse_id = null;

                // Transaction table
                $montant = $request->montant;
                $presolde = $banque->solde;
                $postSolde = (float) $presolde + (float) $montant;

                $Transanction = new Transaction();
                $Transanction->banque_id = $indice;
                $Transanction->caisse_id = null;
                $Transanction->motif = $motif;
                $Transanction->montant = $montant;
                $Transanction->pre_solde_banque = $presolde;
                $Transanction->post_solde_banque = $postSolde;
                $Transanction->pre_solde_caisse = null;
                $Transanction->post_solde_caisse = null;
                $Transanction->type = "credit";

                $Transanction->save();

                // Update solde banque table

                $banque->solde = $postSolde;
                $banque->update();

            } elseif ($nature == "C") {
                // Reglement table
                $caisse = Caisse::where([['id', $indice], ['entreprise_id', auth()->user()->entreprise_id]])->first();
                $Reglement->approvisionnememnt = $caisse->nom;
                $Reglement->caisse_id = $indice;
                $Reglement->banque_id = null;

                // Transaction table
                $montant = $request->montant;
                $presolde = $caisse->solde;
                $postSolde = (float) $presolde + (float) $montant;

                $Transanction = new Transaction();
                $Transanction->banque_id = null;
                $Transanction->caisse_id = $indice;
                $Transanction->motif = $motif;
                $Transanction->montant = $montant;
                $Transanction->pre_solde_banque = null;
                $Transanction->post_solde_banque = null;
                $Transanction->pre_solde_caisse = $presolde;
                $Transanction->post_solde_caisse = $postSolde;
                $Transanction->type = "credit";

                $Transanction->save();

                // Update solde caisse table

                $caisse->solde = $postSolde;
                $caisse->update();
            }

            $Reglement->save();
            return back()->withSuccess('Réglement éffectuer avec succès');
        }


    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Reglement::class);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $factures = Facture::pluck('cc_cci', 'id');
        $paiementsModes = PaiementsMode::pluck('nom', 'id');
        $banques = Banque::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');

        return view(
            'app.reglements.create',
            compact(
                'clientsEntreprises',
                'factures',
                'paiementsModes',
                'banques',
                'caisses'
            )
        );
    }

    /**
     * @param \App\Http\Requests\ReglementStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReglementStoreRequest $request)
    {
        $this->authorize('create', Reglement::class);

        $validated = $request->validated();

        $reglement = Reglement::create($validated);

        return redirect()
            ->route('reglements.edit', $reglement)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reglement $reglement)
    {
        $this->authorize('view', $reglement);

        return view('app.reglements.show', compact('reglement'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reglement $reglement)
    {
        $this->authorize('update', $reglement);

        $clientsEntreprises = ClientsEntreprise::pluck('nom', 'id');
        $factures = Facture::pluck('cc_cci', 'id');
        $paiementsModes = PaiementsMode::pluck('nom', 'id');
        $banques = Banque::pluck('nom', 'id');
        $caisses = Caisse::pluck('nom', 'id');

        return view(
            'app.reglements.edit',
            compact(
                'reglement',
                'clientsEntreprises',
                'factures',
                'paiementsModes',
                'banques',
                'caisses'
            )
        );
    }

    /**
     * @param \App\Http\Requests\ReglementUpdateRequest $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReglementUpdateRequest $request,
        Reglement $reglement
    ) {
        $this->authorize('update', $reglement);

        $validated = $request->validated();

        $reglement->update($validated);

        return redirect()
            ->route('reglements.edit', $reglement)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reglement $reglement)
    {
        $this->authorize('delete', $reglement);

        $reglement->delete();

        return redirect()
            ->route('reglements.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
