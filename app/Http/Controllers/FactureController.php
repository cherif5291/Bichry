<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\FacturesArticle;
use App\Models\ClientsEntreprise;
use App\Models\PaiementsModalite;
use App\Http\Requests\FactureStoreRequest;
use App\Http\Requests\FactureUpdateRequest;
use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\Depense;
use App\Models\DepensesPanier;
use App\Models\DepensesSimple;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsMode;
use App\Models\Paiementsource;
use App\Models\PiecesJointe;
use App\Models\Reglement as ModelsReglement;
use App\Models\SessionControl;
use App\Models\Taxe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class FactureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

            $Factures = Facture::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Liste des factures";
            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Articles = Article::where('entreprise_id', $EntrepriseID)->get();
            $Modalites = PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();
            $Taxes = Taxe::all();
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();

            $Reglements = ModelsReglement::all();
            // dd($Reglements);
            //dd($EntrepriseID);
            return view('entreprise.commerciale.factures.index', compact('Factures', 'Caisses', 'Banques', 'ModesPaiements', 'SourcesPaiement', 'Taxes', 'DevisesMonetaires', 'ComptesComptables',  'Modalites', 'PageName', 'Clients', 'Articles', 'Session'));
        } else {
            $Session = 0;

            $Factures = Facture::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Liste des factures";
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Articles = Article::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Modalites = PaiementsModalite::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Taxes = Taxe::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $DevisesMonetaires = DevisesMonetaire::all();
            $ComptesComptables = Comptescomptable::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Banques = Banque::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Caisses = Caisse::where('entreprise_id', Auth::user()->entreprise_id)->get();

            return view('entreprise.commerciale.factures.index', compact('Factures', 'Caisses', 'Banques', 'ModesPaiements', 'SourcesPaiement', 'Taxes', 'DevisesMonetaires', 'ComptesComptables',  'Modalites', 'PageName', 'Clients', 'Articles', 'Session'));
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function newFacture($id)
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

            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Articles = Article::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Nouvelle facture commerciale";
            $Modalites = PaiementsModalite::where('entreprise_id', $EntrepriseID)->get();
            $Taxes = Taxe::all();
            $DepensePaniers = DepensesPanier::where('facture_id', $id)->get();
            $Facture = Facture::find($id);
            $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
            $Facture->total = $DepensePanier->sum('total') ?? 0;
            $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
            $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
            $Facture->update();
            return view('entreprise.commerciale.factures.facture.new', compact('Clients', 'Articles', 'PageName', 'Modalites', 'Taxes', 'DepensePaniers',  'Facture', 'Session'));
        } else {
            $Session = 0;
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Articles = Article::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Nouvelle facture commerciale";
            $Modalites = PaiementsModalite::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Taxes = Taxe::all();
            $DepensePaniers = DepensesPanier::where('facture_id', $id)->get();
            $Facture = Facture::find($id);
            $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
            $Facture->total = $DepensePanier->sum('total') ?? 0;
            $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
            $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
            $Facture->update();
            return view('entreprise.commerciale.factures.facture.new', compact('Clients', 'Articles', 'PageName', 'Modalites', 'Taxes', 'DepensePaniers',  'Facture', 'Session'));
        }
    }
    public function newFactureRecu($id)
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

            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID)->get();
            $Articles = Article::where('entreprise_id', $EntrepriseID)->get();
            $PageName = "Nouveau reçu de vent";
            $ModePaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
            $Taxes = Taxe::all();

            $DepensePaniers = DepensesPanier::where('facture_id', $id)->get();
            $Facture = Facture::find($id);
            $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
            $Facture->total = $DepensePanier->sum('total') ?? 0;
            $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
            $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
            $Facture->update();
            // dd($Facture->facture_id);
            return view('entreprise.commerciale.factures.recu.new', compact('Clients', 'Articles', 'PageName', 'ModePaiements', 'SourcesPaiement', 'DepensePaniers', 'Facture', 'Taxes', 'Caisses', 'Banques', 'Session'));
        } else {
            $Session = 0;
            $Clients = ClientsEntreprise::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Articles = Article::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $PageName = "Nouveau reçu de vent";
            $ModePaiements = PaiementsMode::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', Auth::user()->entreprise_id)->get();
            $Taxes = Taxe::all();

            $DepensePaniers = DepensesPanier::where('facture_id', $id)->get();
            $Facture = Facture::find($id);
            $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
            $Facture->total = $DepensePanier->sum('total') ?? 0;
            $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
            $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
            $Facture->update();
            // dd($Facture->facture_id);
            return view('entreprise.commerciale.factures.recu.new', compact('Clients', 'Articles', 'PageName', 'ModePaiements', 'SourcesPaiement', 'DepensePaniers', 'Facture', 'Taxes', 'Caisses', 'Banques', 'Session'));
        }
    }

    // public function newDepenseCheque($id)
    // {
    //     $Clients = ClientsEntreprise::all();
    //     $Fournisseurs = Fournisseur::all();
    //     $CompteComptables = Comptescomptable::all();
    //     $PageName = "Nouveau Chèque";
    //     $ModePaiements = PaiementsMode::all();
    //     $SourcesPaiement = Paiementsource::where('entreprise_id', Auth::user()->entreprise_id)->get();
    //     $Taxes = Taxe::all();
    //     $DepensePaniers = DepensesPanier::where('depense_id', $id)->get();
    //     $Depense = Depense::find($id);
    //     $Cheque = Cheque::find($Facture->cheque_id);
    //     // dd($Facture->facture_id);
    //     return view('entreprise.depenses.depenses.cheque.new', compact( 'Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'ModePaiements', 'SourcesPaiement' , 'DepensePaniers', 'Depense', 'Cheque', 'Taxes'));
    // }
    // public function newDepenseCreditFournisseur($id)
    // {
    //     $Clients = ClientsEntreprise::all();
    //     $Fournisseurs = Fournisseur::all();
    //     $CompteComptables = Comptescomptable::all();
    //     $PageName = "Nouveau crédit fournisseur";
    //     $ModePaiements = PaiementsMode::all();
    //     $SourcesPaiement = Paiementsource::where('entreprise_id', Auth::user()->entreprise_id)->get();
    //     $Taxes = Taxe::all();
    //     $DepensePaniers = DepensesPanier::where('depense_id', $id)->get();
    //     $Depense = Depense::find($id);
    //     $CreditFournisseur = FournisseursCredit::find($Facture->credit_fournisseur_id);
    //     // dd($Facture->facture_id);
    //     return view('entreprise.depenses.depenses.creditFournisseurs.new', compact( 'Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'ModePaiements', 'SourcesPaiement' , 'DepensePaniers', 'Depense', 'CreditFournisseur', 'Taxes'));
    // }

    public function newDraftFacture($id)
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

            $Client = ClientsEntreprise::find($id);
            $PageName = "Informations sur le client";

            return view('entreprise.clients.dossier', compact('Client', 'PageName', 'Session'));
        } else {
            $Session = 0;
            $Client = ClientsEntreprise::find($id);
            $PageName = "Informations sur le client";

            return view('entreprise.clients.dossier', compact('Client', 'PageName', 'Session'));
        }
        $Draft = new Facture();
        $Draft->entreprise_id = Auth::user()->entreprise_id;
        if ($id == 1) {
            $Draft->type = "facture";
            $Draft->save();
            return redirect(route('entreprise.factures.new.facture', $Draft->id))->with('success', "Brouillon créé avec succès");
        } elseif ($id == 2) {
            $Draft->type = "recu";
            $Draft->save();
            return redirect(route('entreprise.commerciale.factures.recu.new', $Draft->id))->with('success', "Brouillon créé avec succès");
        }
        // elseif ($id == 3) {
        //     $Draft->type = "cheque";
        //     $Draft->save();
        //     return redirect(route('entreprise.depense.new.cheque', $Draft->id))->with('success', "Brouillon créé avec succès");
        // }elseif ($id == 4) {
        //     $Draft->type = "credit";
        //     $Draft->save();
        //     return redirect(route('entreprise.depense.new.creditFournisseurs', $Draft->id))->with('success', "Brouillon créé avec succès");
        // }

    }
    public function addArticletoFacture(Request $request)
    {
        $this->validate($request, [
            'article_id' => 'required',
            'qte' => 'nullable',
            'facture_id' => 'required',

        ]);
        $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
        $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        if ($Session->preloader == "yes") {
            $Session = 0;
        } else {
            $Session = 1;
        }
        $DepensePanier = new DepensesPanier();
        $DepensePanier->facture_id = $request->input('facture_id');
        $DepensePanier->clients_entreprise_id = $request->input('clients_entreprise_id');
        $DepensePanier->article_id = $request->input('article_id');
        $DepensePanier->qte = $request->input('qte') ?? 1;
        $Article = Article::find($DepensePanier->article_id);
        $prix = $Article->prix_unitaire * $DepensePanier->qte;
        $DepensePanier->montant = $Article->prix_unitaire;

        $DepensePanier->total = 0;
        $DepensePanier->entreprise_id =  $EntrepriseID;

        if ($Article->taxe_id > 0) {
            $Taxe = Taxe::find($Article->taxe_id);
            // dd($Article->taxe_id);
            $DepensePanier->taux_taxe = $Taxe->taux;
            $DepensePanier->montant_taxe = (($prix * $Taxe->taux) / 100);
            $DepensePanier->taxe_id = $Article->taxe_id;
            $DepensePanier->total = $prix + (($prix * $Taxe->taux) / 100);
        }
        if (!$Article->taxe_id) {
            dd($Article->taxe_id);
            $DepensePanier->taxe_id = null;
            $DepensePanier->taux_taxe = 0;
            $DepensePanier->montant_taxe = 0;
            $DepensePanier->total = $prix;
        }

        $DepensePanier->designation = "[" . $Article->categoriesArticle->type . "] " . $Article->nom;
        $DepensePanier->save();
        $Facture  = Facture::find($request->input('facture_id'));
        $DepensePanier = DepensesPanier::where('facture_id', $Facture->id)->get();
        $Facture->total = $DepensePanier->sum('total') ?? 0;
        $Facture->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Facture->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Facture->update();
        return back()->with('success', "Article ajouté avec succès sur la facture !");
    }

    public function depenseFactureAdd(Request $request)
    {
        $this->validate($request, [
            'fournisseur' => 'required',
            'date_facturation' => 'nullable',
            'echeance' => 'nullable',
            'has_taxe' => 'nullable',
            'numero_facture' => "nullable",
            'numero_cheque' => "nullable",
            'adresse_postale' => "nullable",

            'adresse_facturation' => "nullable",
            'paiements_modalite_id' => "nullable",
            'message' => "nullable",
            'message_a' => "nullable",
            'cc_cci' => "nullable",

            'paiements_mode_id' => "nullable",
            'reference' => "nullable",
            'numero_recu' => "nullable",
            'paiement_source_id' => "nullable",

            'article_id' => "nullable",
            'description' => "nullable",
            'qte' => "nullable",
            'montant' => "nullable",
            'taxe_id' => "nullable",
            'fichier' => "nullable",



        ]);


        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        //dd($request->all());

        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);


        $Facture = new Facture();
        if ($request->input('type') == "facture") {
            $Facture->type = "facture";
        } elseif ($request->input('type') == "recu") {
            $Facture->type = "recu";
        }

        if ($nature == "F") {
            $Facture->fournisseur_id = $indice;
            $Facture->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Facture->clients_entreprise_id = $indice;
            $Facture->fournisseur_id = null;
        }




        if ($Facture->type == "facture") {


            $Facture->date_facturation = $request->input('date_facturation');
            $Facture->echeance = $request->input('echeance');
            $Facture->numero_facture = $request->input('numero_facture');
            $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
            $Facture->cc_cci = $request->input('cc_cci');
            $Facture->message = $request->input('message');
            $Facture->message_affiche = $request->input('message_affiche');
            $Facture->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->type = "facture";

            $Facture->save();

            $fichier = new PiecesJointe();
            $fichier->entreprise_id = $EntrepriseID;
            $fichier->facture_id = $Facture->id;
        }

        if ($Facture->type == "recu") {

            $Facture->date_recu = $request->input('date_facturation');
            $Facture->paiement_source_id = $request->input('paiement_source_id');
            $Facture->numero_recu = $request->input('numero_recu');

            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_mode_id = $request->input('paiements_mode_id');
            $Facture->message = $request->input('message');
            $Facture->message_affiche = $request->input('message_affiche');
            $Facture->cc_cci = $request->input('cc_cci');
            $Facture->reference = $request->input('reference');
            $Payepar = Paiementsource::find($Facture->paiement_source_id);
            if ($Payepar) {
                $Facture->intitule_source = "(" . $Payepar->type . ") " . $Payepar->nom;
            } else {
                $Facture->intitule_source = "introuvable";
            }

            $Facture->entreprise_id = $EntrepriseID;

            $Facture->type = "recu";
            $Facture->save();


        }

        if ($request->hasFile('fichier')) {
            $fichier = new PiecesJointe();
            $fichier->entreprise_id = $EntrepriseID;
            $fichier->facture_id = $Facture->id;
            if ($request->hasFile('fichier')) {

                $logo = time() . '.' . $request->fichier->getClientOriginalExtension();
                $path_name = 'storage/uploads/pdf/' . date('Y') . "/" . date('F') . '/';

                if ($request->fichier->move($path_name, $logo)) {
                    $fichier->fichier = $path_name . $logo;
                }
            }

            $fichier->save();
        }

        if ($request->input('article_id')) {
            //$zone_id = $zone->id;
            $article = $request->input('article_id');
            $quantite = $request->input('qte');
            $montant = $request->input('montant');
            $description = $request->input('description');
            $taxe_id = $request->input('taxe_id');

            $EntrepriseID = 0;
            if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
                $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
                $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
            } else {
                $EntrepriseID = Auth::user()->entreprise_id;
            }

            foreach ($article as $key => $n) {
                if ($article[$key] != null || $article[$key] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->facture_id = $Facture->id;

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->article_id = $article[$key] ?? 0;
                    $DepensePanier->description = $description[$key] ?? 0;
                    $DepensePanier->qte = $quantite[$key] ?? 0;
                    $DepensePanier->montant = $montant[$key] * $DepensePanier->qte;
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id = $EntrepriseID;

                    if ($taxe_id[$key] > 0) {
                        $Taxe = Taxe::find($taxe_id[$key]);

                        $DepensePanier->taux_taxe = $Taxe->taux ?? 0;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id[$key];
                        $DepensePanier->total = $DepensePanier->montant + ($DepensePanier->montant_taxe ?? 0);
                    }
                    if ($taxe_id[$key] < 0) {
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
        return back()->with('success', "Facture ajoutée avec succès!");
    }

    public function depenseFactureUpdate(Request $request)
    {
        $this->validate($request, [
            'fournisseur' => 'required',
            'date_facturation' => 'nullable',
            'echeance' => 'nullable',
            'has_taxe' => 'nullable',
            'numero_facture' => "nullable",
            'numero_cheque' => "nullable",
            'adresse_postale' => "nullable",

            'adresse_facturation' => "nullable",
            'paiements_modalite_id' => "nullable",
            'message' => "nullable",
            'message_a' => "nullable",
            'cc_cci' => "nullable",

            'paiements_mode_id' => "nullable",
            'paiements_source_id' => "nullable",
            'reference' => "nullable",
            'numero_recu' => "nullable",

            'article_id' => "nullable",
            'description' => "nullable",
            'qte' => "nullable",
            'montant' => "nullable",
            'taxe_id' => "nullable",


        ]);


        //dd($request->all());

        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);


        $Facture = Facture::find($request->id);

        /*  if ($request->input('type') == "facture") {
            $Facture->type = "facture";
        } elseif ($request->input('type') == "recu") {
            $Facture->type = "recu";
        } */

        if ($nature == "F") {
            $Facture->fournisseur_id = $indice;
            $Facture->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Facture->clients_entreprise_id = $indice;
            $Facture->fournisseur_id = null;
        }

        //return $Facture->clients_entreprise_id;

        if ($request->hasFile('fichier')) {
            $fichier =  PiecesJointe::where('facture_id',  $Facture->id)->first();
            $fichier->entreprise_id = $EntrepriseID;
            $fichier->facture_id = $Facture->id;


            if ($request->hasFile('fichier')) {

                $logo = time() . '.' . $request->fichier->getClientOriginalExtension();
                $path_name = 'storage/uploads/pdf/' . date('Y') . "/" . date('F') . '/';

                if ($request->fichier->move($path_name, $logo)) {
                    $fichier->fichier = $path_name . $logo;
                }
            }
            $fichier->update();
        }

        if ($Facture->type == "facture") {


            $Facture->date_facturation = $request->input('date_facturation');
            $Facture->echeance = $request->input('echeance');
            $Facture->numero_facture = $request->input('numero_facture');
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
            $Facture->cc_cci = $request->input('cc_cci');
            $Facture->message = $request->input('message');
            $Facture->message_affiche = $request->input('message_affiche');
            $Facture->entreprise_id = $EntrepriseID;

            $Facture->type = "facture";

            $Facture->update();



        }

        if ($Facture->type == "recu") {

            $Facture->date_recu = $request->input('date_facturation');
            $Facture->paiement_source_id = $request->input('paiements_source_id');
            $Facture->numero_recu = $request->input('numero_recu');
            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->paiements_mode_id = $request->input('paiements_mode_id');
            $Facture->message = $request->input('message');
            $Facture->message_affiche = $request->input('message_affiche');
            $Facture->cc_cci = $request->input('cc_cci');
            $Facture->reference = $request->input('reference');
            $Payepar = Paiementsource::find($Facture->paiement_source_id);
            if ($Payepar) {
                $Facture->intitule_source = "(" . $Payepar->type . ") " . $Payepar->nom;
            } else {
                $Facture->intitule_source = "introuvable";
            }


            $Facture->type = "recu";
            $Facture->update();

        }

        if ($request->input('article_id')) {
            //$zone_id = $zone->id;
            $article = $request->input('article_id');
            $quantite = $request->input('qte');
            $montant = $request->input('montant');
            $description = $request->input('description');
            $taxe_id = $request->input('taxe_id');

            foreach ($article as $key => $n) {
                if ($article[$key] != null || $article[$key] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->facture_id = $Facture->id;

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->article_id = $article[$key] ?? 0;
                    $DepensePanier->description = $description[$key] ?? 0;
                    $DepensePanier->qte = $quantite[$key] ?? 0;
                    $DepensePanier->montant = $montant[$key] * $DepensePanier->qte;
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id =  $EntrepriseID;

                    if ($taxe_id[$key] > 0) {
                        $Taxe = Taxe::find($taxe_id[$key]);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id[$key];
                        $DepensePanier->total = $DepensePanier->montant + ($DepensePanier->montant_taxe ?? 0);
                    }
                    if ($taxe_id[$key] < 0) {
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

    public function destroy($id)
    {
        $Facture = Facture::find($id);

        if ($Facture->type == "facture") {

            DepensesPanier::where('facture_id', $Facture->id)->delete();
            Facture::find($id)->delete();

            //return redirect(route('factures.index'))->with('success', "Facture supprimée avec succés");
            //illugraphic CodeLab :)
        } elseif ($Facture->type == "recu") {

            DepensesPanier::where('facture_id', $Facture->id)->delete();
            Facture::find($id)->delete();
            //return redirect(route('factures.index'))->with('success', "Facture supprimée avec succés");
        }
    }

    public function getFacture($id)
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


    public function facture($id)
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
            $ID = $id;
            $Facture = Facture::find($id);
            $PageName = "Facture & Règlements";
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.commerciale.factures.invoice.facture', compact('Facture', 'PageName', 'Session', 'ModesPaiements', 'SourcesPaiement', 'Banques', 'Caisses', 'ID'));
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
            $ID = $id;
            $Session = 0;
            $Facture = Facture::find($id);
            $PageName = "Facture & Règlements";
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID)->get();
            $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
            $Banques = Banque::where('entreprise_id', $EntrepriseID)->get();
            $Caisses = Caisse::where('entreprise_id', $EntrepriseID)->get();
            return view('entreprise.commerciale.factures.invoice.facture', compact('Facture', 'PageName', 'Session', 'ModesPaiements', 'SourcesPaiement', 'Banques', 'Caisses', 'ID'));
        }
    }

    public function pdf($id)
    {
        $Facture = Facture::find($id);
        $Entreprise = $Facture->entreprise->nom_entreprise;
        $FactureNumber = $Facture->numero_facture ?? $Facture->numero_recu;
        $Client = $Facture->clientsEntreprise->nom;

        view()->share('Facture', $Facture);
        $pdf = PDF::loadView('entreprise/commerciale/factures/invoice/pdf', $Facture);
        $content = $pdf->download()->getOriginalContent();
        $filepath = "/storage/docs/facture-recu/" . $Entreprise . "/" . $Client . "/facture N°" . $FactureNumber . " pour " . $Client . " - " . $Entreprise . ".pdf";
        Storage::put("public/docs/facture-recu/" . $Entreprise . "/" . $Client . "/facture N°" . $FactureNumber . " pour " . $Client . " - " . $Entreprise . ".pdf", $content);
        $Facture->pdf_link =  $filepath;
        $Facture->update();
        return redirect(asset($Facture->pdf_link));
    }

    public function sendFactureByMail($id)
    {
        $Facture = Facture::find($id);

        $Entreprise = $Facture->entreprise->nom_entreprise;
        $FactureNumber = $Facture->numero_facture ?? $Facture->numero_recu;
        $Client = $Facture->clientsEntreprise->nom;

        view()->share('Facture', $Facture);
        $pdf = PDF::loadView('entreprise/commerciale/factures/invoice/pdf', $Facture);
        $content = $pdf->download()->getOriginalContent();
        $filepath = "/storage/docs/facture-recu/" . $Entreprise . "/" . $Client . "/facture N°" . $FactureNumber . " pour " . $Client . " - " . $Entreprise . ".pdf";
        Storage::put("public/docs/facture-recu/" . $Entreprise . "/" . $Client . "/facture N°" . $FactureNumber . " pour " . $Client . " - " . $Entreprise . ".pdf", $content);
        $Facture->pdf_link =  $filepath;
        $Facture->update();

        // $encrypt = array("##numero_facture##", "##montant_facture##", "##audacesSiren##", "##appEmail##", "##appTelephone##", "##contactResponsable##",
        // "##stagiaireNomComplet##", "##stagiaireAdresse##","##stagiaireTelephone##",
        // "##nomFormation##","##objectifFormation##","##prixFormation##","##prixFormationAlpha##","##nbreHeures##",
        // "##lieuFormation##","##niveauSortie##","##emmissionInscription##", "##emmissionFinal##","##typeValidation##","##modalitePedagogique##","##dateDu##","##dateAu##",
        // "##prenomFormateur##","##nomFormateur##","##emailFormateur##",  "##telephoneFormateur##","##qualificationFormateur##","##langueFormateur##",
        // );
        // $transcript   = array($InfosSystem->nom_entreprise??"null", $InfosSystem->adresse??"null", $InfosSystem->siren??"null", $InfosSystem->email??"null", "0".$InfosSystem->telephone??"null", $InfosSystem->responsable_formation??"null",
        // $StagiaireNC??"null", $Inscription->stagiaire->adresse??"null", $Inscription->stagiaire->telephone??"null",
        // $thisFormation->nom_formation??"null", $thisFormation->objectif??"null", $Inscription->prix_formation??"null", $thisFormation->priceLetter??"null", $thisFormation->temps??"null",
        // $Inscription->lieu_deroulement??"null", $Inscription->niveau_sortie??"null", $Inscription->emission_at_inscription??"null", $Inscription->emission_at_finale??"null", $Inscription->type_validation??"null", $Inscription->modalite_pedagogique??"null",$Inscription->date_du??"null", $Inscription->date_au??"null",
        // $thisFormateur->prenom??"null", $thisFormateur->nom??"null", $thisFormateur->email??"null", $thisFormateur->telephone??"null", $TFormateur->qualification??"null", $TFormateur->language??"null"
        // );
        // $contenu = "";
        // $message = str_replace($encrypt, $transcript, $contenu);


        $description = "Votre fature est disponle. Facture N° $Facture->numero_facture arrêté a la somme de ".formatpriceth($Facture->total, getCurrency())."  . Nous vous prions de faire le règlement avant la date de l'échéance: $Facture->echeance";
        // dd($message);
        $intitule = Facture::find($id)->clientsEntreprise;
        $pdf_link = Facture::find($id)->pdf_link;
        $btn_lien_utile = "Vous pouvez vour la facture en cliquant sur ce lien:";
        $link_lien_utile = $pdf_link;
        $objet = "Votre Facture N°" . $Facture->numero_facture ?? $Facture->numero_recu . "| " . $Facture->entreprise->nom_entreprise;
        sendNotificationMail("ollaidpn@gmail.com", $intitule, $description, $btn_lien_utile, $link_lien_utile, public_path($pdf_link), $objet, $Facture);
        return back()->with('success', "Facture envoyé avec succès au client");
    }

    public function show()
    {
        # code...
    }
    public function edit()
    {
        # code...
    }
    public function create()
    {
        # code...
    }
}
