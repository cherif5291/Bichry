<?php

namespace Modules\Commerciale\Http\Controllers;

use App\Models\Article;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\DepensesPanier;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\Paiementsource;
use App\Models\PiecesJointe;
use App\Models\SessionControl;
use App\Models\Taxe;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommercialeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Session = getUserSession();

        $PageName = "Liste des factures";

        if (auth()->user()->role == "cabinet" && $Session) {
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            if ($Session->preloader == "yes") {
                $Session = 0;
            } else {
                $Session = 1;
            }
        } else {
            $Session = 0;
        }
        return view('commerciale::index', compact('PageName', 'Session'));
    }

    public function addNewArticle($data)
    {
        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = auth()->user()->entreprise_id;
        }
        $Article = new Article();
        $Article->entreprise_id = $EntrepriseID;
        $Article->description = $data['description'] ?? '';
        $Article->type = $data['type'] ?? '';
        $Article->prix_unitaire = $data['prix_unitaire'] ?? 0;
        $Article->stock = $data['stock'] ?? 1;
        $Article->comptes_comptable_id = $data['comptes_comptable_id'];
        $Article->taxe_id = $data['taxe_id'];
        $Article->nom = $data['nom'] ?? '';

        $Article->save();
    }

    public function addNewClient($data)
    {
        $ClientsEntreprise = new ClientsEntreprise();

        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = auth()->user()->entreprise_id;
        }
        $ClientsEntreprise->entreprise_id = $EntrepriseID;
        $ClientsEntreprise->entreprise = $data['entreprise'] ?? '';
        $ClientsEntreprise->prenom = $data['prenom'] ?? '';
        $ClientsEntreprise->nom = $data['nom'] ?? '';
        $ClientsEntreprise->email = $data['email'] ?? '';
        $ClientsEntreprise->telephone = $data['telephone'] ?? '';
        $ClientsEntreprise->adresse = $data['adresse'] ?? '';
        $ClientsEntreprise->ville = $data['ville'] ?? '';
        $ClientsEntreprise->pays = $data['pays'] ?? '';
        $ClientsEntreprise->titre = $data['titre'] ?? '';
        // $ClientsEntreprise->paiements_modalite_id = $data['paiements_modalite_id'];
        // $ClientsEntreprise->paiements_mode_id = $data['paiements_mode_id'];
        // $ClientsEntreprise->devises_monetaire_id = $data['devises_monetaire_id'];

        $ClientsEntreprise->save();
    }

    public function depenseFactureAdd($data)
    {

        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = auth()->user()->entreprise_id;
        }
        $nature = substr_replace($data['fournisseur'] ?? "", "", 1);
        $indice = (int) filter_var($data['fournisseur'], FILTER_SANITIZE_NUMBER_INT);


        $Facture = new Facture();


        if ($nature == "F") {
            $Facture->fournisseur_id = $indice;
            $Facture->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Facture->clients_entreprise_id = $indice;
            $Facture->fournisseur_id = null;
        }
        //dd($data);

        if ($data['type'] == "facture") {


            $Facture->date_facturation = $data['date_facturation'];
            $Facture->echeance = $data['echeance'];
            $Facture->numero_facture = $data['numero_facture'];
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_modalite_id = $data['paiements_modalite_id'];
            $Facture->cc_cci = $data['cc_cci'];
            $Facture->message = $data['message'];
            $Facture->message_affiche = $data['message_affiche'];
            $Facture->entreprise_id = $EntrepriseID;

            $Facture->type = "facture";

            $Facture->save();

            // $fichier = new PiecesJointe();
            // $fichier->entreprise_id = $EntrepriseID;
            // $fichier->facture_id = $Facture->id;
        }

        if ($data['type'] == "recu") {

            $Facture->date_recu = $data['date_facturation'];
            $Facture->paiement_source_id = $data['paiements_source_id'];
            $Facture->numero_recu = $data['numero_recu'];
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_mode_id = $data['paiements_mode_id'];
            $Facture->message = $data['message'];
            $Facture->message_affiche = $data['message_affiche'];
            $Facture->cc_cci = $data['cc_cci'];
            $Facture->reference = $data['reference'];
            $Payepar = Paiementsource::find($Facture->paiement_source_id);
            if ($Payepar) {
                $Facture->intitule_source = "(" . $Payepar->type . ") " . $Payepar->nom;
            } else {
                $Facture->intitule_source = "introuvable";
            }


            $Facture->entreprise_id = $EntrepriseID;

            $Facture->type = "recu";
            $Facture->save();

            // $fichier = new PiecesJointe();
            // $fichier->entreprise_id = $EntrepriseID;
            // $fichier->facture_id = $Facture->id;
        }


        if (count($data['rowArticle']) > 0) {

            $article = $data['rowArticle'];

            foreach ($article as $key => $n) {
                if ($article[$key]['article_id'] != null || $article[$key]['article_id'] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->facture_id = $Facture->id;

                    if ($article[$key]['taxe_id'] == "") {
                        $taxe_id = -1;
                    } else {
                        $taxe_id = (int)$article[$key]['taxe_id'];
                    }

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->article_id = $article[$key]['article_id'] ?? 0;
                    $DepensePanier->description = $article[$key]['description'] ?? 0;
                    $DepensePanier->qte = $article[$key]['qte'] ?? 0;
                    $DepensePanier->montant = $article[$key]['montant'];
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id =  $EntrepriseID;

                    if ($taxe_id > 0) {

                        $Taxe = Taxe::find($taxe_id);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id;
                        $DepensePanier->total = $DepensePanier->montant + ($DepensePanier->montant_taxe ?? 0);
                    }
                    if ($taxe_id < 0) {
                        $DepensePanier->taxe_id = null;
                        $DepensePanier->taux_taxe = 0;
                        $DepensePanier->montant_taxe = 0;

                        $DepensePanier->total = $DepensePanier->montant;
                    }

                    $CompteComptables = Article::find($DepensePanier->article_id);
                    if ($CompteComptables) {
                        $DepensePanier->designation = $CompteComptables->nom;
                    }

                    $DepensePanier->save();
                }
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }


        $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
        $Facture->total = $DepensePanier->sum('total') ?? 0;
        $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Facture->update();
        return back()->with('success', "Facture Modifié avec succès!");
    }

    public function depenseFactureUpdate($data)
    {
        //dd($data['fichier']->getClientOriginalExtension());
        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = auth()->user()->entreprise_id;
        }
        $nature = substr_replace($data['fournisseur'] ?? "", "", 1);
        $indice = (int) filter_var($data['fournisseur'], FILTER_SANITIZE_NUMBER_INT);


        $Facture = Facture::find($data['idFacture']);


        if ($nature == "F") {
            $Facture->fournisseur_id = $indice;
            $Facture->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Facture->clients_entreprise_id = $indice;
            $Facture->fournisseur_id = null;
        }

        if ($Facture->type == "facture") {


            $Facture->date_facturation = $data['date_facturation'];
            $Facture->echeance = $data['echeance'];
            $Facture->numero_facture = $data['numero_facture'];
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_modalite_id = $data['paiements_modalite_id'];
            $Facture->cc_cci = $data['cc_cci'];
            $Facture->message = $data['message'];
            $Facture->message_affiche = $data['message_affiche'];
            $Facture->entreprise_id = $EntrepriseID;

            $Facture->type = "facture";

            $Facture->update();
        }

        if ($Facture->type == "recu") {

            $Facture->date_recu = $data['date_recu'];
            $Facture->paiement_source_id = $data['paiements_source_id'];
            $Facture->numero_recu = $data['numero_recu'];
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_mode_id = $data['paiements_mode_id'];
            $Facture->message = $data['message'];
            $Facture->message_affiche = $data['message_affiche'];
            $Facture->cc_cci = $data['cc_cci'];
            $Facture->reference = $data['reference'];
            $Payepar = Paiementsource::find($Facture->paiement_source_id);
            if ($Payepar) {
                $Facture->intitule_source = "(" . $Payepar->type . ") " . $Payepar->nom;
            } else {
                $Facture->intitule_source = "introuvable";
            }


            $Facture->type = "recu";
            $Facture->update();
        }

        if (count($data['rowArticle']) > 0) {

            $article = $data['rowArticle'];

            foreach ($article as $key => $n) {
                if ($article[$key]['article_id'] != null || $article[$key]['article_id'] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->facture_id = $Facture->id;

                    if ($article[$key]['taxe_id'] == "") {
                        $taxe_id = -1;
                    } else {
                        $taxe_id = (int)$article[$key]['taxe_id'];
                    }

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->article_id = $article[$key]['article_id'] ?? 0;
                    $DepensePanier->description = $article[$key]['description'] ?? 0;
                    $DepensePanier->qte = $article[$key]['qte'] ?? 0;
                    $DepensePanier->montant = $article[$key]['montant'];
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id =  $EntrepriseID;

                    if ($taxe_id > 0) {

                        $Taxe = Taxe::find($taxe_id);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id;
                        $DepensePanier->total = $DepensePanier->montant + ($DepensePanier->montant_taxe ?? 0);
                    }
                    if ($taxe_id < 0) {
                        $DepensePanier->taxe_id = null;
                        $DepensePanier->taux_taxe = 0;
                        $DepensePanier->montant_taxe = 0;

                        $DepensePanier->total = $DepensePanier->montant;
                    }

                    $CompteComptables = Article::find($DepensePanier->article_id);
                    if ($CompteComptables) {
                        $DepensePanier->designation = $CompteComptables->nom;
                    }

                    $DepensePanier->save();
                }
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }


        $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
        $Facture->total = $DepensePanier->sum('total') ?? 0;
        $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Facture->update();
    }

    public function pieceJointeAdd($piece, $idFacture = null, $EntrepriseID = null)
    {
        $fichier = new PiecesJointe();
        $fichier->entreprise_id = $EntrepriseID;
        $fichier->facture_id = $idFacture;

        $logo = time() . '.' . $piece->getClientOriginalExtension();
        $path_name = 'storage/uploads/pdf/' . date('Y') . "/" . date('F') . '/';

        if ($piece->storeAs('uploads/pdf/', $logo)) {
            $fichier->fichier = $path_name . $logo;
        }

        $fichier->save();
    }

    public function pieceJointeUpdate($piece, $idFacture = null, $EntrepriseID = null)
    {
        if (PiecesJointe::where('facture_id',  $idFacture)->first()) {
            # code...

        $fichier =  PiecesJointe::where('facture_id',  $idFacture)->first();

        $logo = time() . '.' . $piece->getClientOriginalExtension();
        $path_name = 'storage/uploads/pdf/' . date('Y') . "/" . date('F') . '/';

        if ($piece->storeAs('uploads/pdf/', $logo)) {
            $piece->storeAs('public/'.$path_name, $logo);
            $fichier->fichier = $path_name . $logo;
        }

        $fichier->update();
        }else {
            $this->pieceJointeAdd($piece, $idFacture, $EntrepriseID);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('commerciale::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('commerciale::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commerciale::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
