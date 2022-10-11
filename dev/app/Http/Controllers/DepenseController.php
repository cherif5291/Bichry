<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\PaiementsMode;
use App\Http\Requests\DepenseStoreRequest;
use App\Http\Requests\DepenseUpdateRequest;
use App\Models\Action;
use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\Cheque;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\DepensesPanier;
use App\Models\DepensesSimple;
use App\Models\DevisesMonetaire;
use App\Models\Fournisseur;
use App\Models\PaiementsModalite;
use App\Models\Taxe;
use Illuminate\Support\Facades\Auth;
use App\Models\Facture;
use App\Models\FournisseursCredit;
use App\Models\Paiementsource;
use App\Models\PiecesJointe;
use App\Models\SessionControl;

class DepenseController extends Controller
{

    // private $varianble;

    // function __construct() {
    //     $this->varianble = Model::find(1);
    // }
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

            $Depenses = Depense::where('entreprise_id', $EntrepriseID )->get();
            $PageName = "Liste des dépenses";
            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID )->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', $EntrepriseID )->get();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $Modalites = PaiementsModalite::where('entreprise_id', $EntrepriseID )->get();
            $Taxes = Taxe::where('entreprise_id', $EntrepriseID )->get();
            $DevisesMonetaires = DevisesMonetaire::all();
            $CompteComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID )->get();
            $DepensePaniers = DepensesPanier::where('entreprise_id', $EntrepriseID )->get();
            $SourcesPaiement =  Paiementsource::where('entreprise_id', $EntrepriseID )->get();
            $CompteComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $Articles = Article::where('entreprise_id', $EntrepriseID )->get();

            return view('entreprise.depenses.index', compact('Articles', 'Depenses', 'SourcesPaiement', 'PageName', 'Clients', 'Fournisseurs', 'ComptesComptables', 'CompteComptables', 'Modalites', 'Taxes', 'DepensePaniers', 'DevisesMonetaires', 'ModesPaiements', 'Session'));
        } else {
            $Session = 0;

            $EntrepriseID = Auth::user()->entreprise_id;
            $Depenses = Depense::where('entreprise_id', $EntrepriseID )->get();
            $PageName = "Liste des dépenses";
            $Clients = ClientsEntreprise::where('entreprise_id', $EntrepriseID )->get();
            $Fournisseurs = Fournisseur::where('entreprise_id', $EntrepriseID )->get();
            $ComptesComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $Modalites = PaiementsModalite::where('entreprise_id', $EntrepriseID )->get();
            $Taxes = Taxe::where('entreprise_id', $EntrepriseID )->get();
            $DevisesMonetaires = DevisesMonetaire::all();
            $CompteComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $ModesPaiements = PaiementsMode::where('entreprise_id', $EntrepriseID )->get();
            $DepensePaniers = DepensesPanier::where('entreprise_id', $EntrepriseID)->get();
            $SourcesPaiement =  Paiementsource::where('entreprise_id', $EntrepriseID )->get();
            $CompteComptables = Comptescomptable::where('entreprise_id', $EntrepriseID )->get();
            $Articles = Article::where('entreprise_id', $EntrepriseID )->get();


            return view('entreprise.depenses.index', compact('Articles', 'Depenses', 'SourcesPaiement', 'PageName', 'Clients', 'Fournisseurs', 'ComptesComptables', 'CompteComptables', 'Modalites', 'Taxes', 'DepensePaniers', 'DevisesMonetaires', 'ModesPaiements', 'Session'));
        }
    }



    public function newDepenseOnPop(Request $request)
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
            'note' => "nullable",
            'paiements_mode_id' => "nullable",
            'reference' => "nullable",
            'paiementsource_id' => "nullable",

            'comptes_comptable_id' => 'nullable',
            'description' => 'nullable',
            'montant' => 'nullable',
            'taxe_id' => 'nullable',
            'type' => 'nullable',
            'fichier' => 'nullable',



        ]);


        // dd($request->all());
        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);

        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }


        $Depense = new Depense();
        if ($request->input('type') == "facture") {
            $Depense->type = "facture";
        } elseif ($request->input('type') == "depense") {
            $Depense->type = "depense";
        } elseif ($request->input('type') == "cheque") {
            $Depense->type = "cheque";
        } elseif ($request->input('type') == "credit") {
            $Depense->type = "credit";
        }
        if ($nature == "F") {
            $Depense->fournisseur_id = $indice;
        } elseif ($nature == "C") {
            $Depense->clients_entreprise_id = $indice;
        }



        $Depense->paiementsource_id = $request->input('paiementsource_id');
        $Depense->note =  $request->input('note');
        $Depense->status = "validated";

        $Depense->entreprise_id = $EntrepriseID;
        $Depense->save();

        if ($request->hasFile('fichier')) {
            $fichier =  new PiecesJointe();
            $fichier->entreprise_id = $EntrepriseID;
            $fichier->depense_id = $Depense->id;
            if ($request->hasFile('fichier')) {

                $logo = time().'.'.$request->fichier->getClientOriginalExtension();
                $path_name = 'storage/uploads/pdf/'. date('Y')."/". date('F'). '/';

                if ($request->fichier->move($path_name, $logo)) {
                    $fichier->fichier = $path_name.$logo;
                }

            }
            $fichier->save();
        }



        if ($Depense->type == "facture") {
            $Facture = new Facture();
            if ($nature == "F") {
                $Facture->fournisseur_id = $indice;
                $Facture->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Facture->clients_entreprise_id = $indice;
                $Facture->fournisseur_id = null;
            }
            $Facture->date_facturation = $request->input('date_facturation');
            $Facture->echeance = $request->input('echeance');
            $Facture->numero_facture = $request->input('numero_facture');
            $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
            $Facture->message = $request->input('note');
            $Facture->entreprise_id = $EntrepriseID;
            $Facture->depense_id = $Depense->id;


            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }
            $Facture->type = "depense";
            $Facture->save();
            $Depense->facture_id = $Facture->id;
            $Depense->update();

            // dd($Facture->echeance);




        }

        if ($Depense->type == "depense") {
            $DepenseSimple = new DepensesSimple();
            $DepenseSimple->fournisseur_id = 0;
            $DepenseSimple->clients_entreprise_id = 0;
            if ($nature == "F") {
                $DepenseSimple->fournisseur_id = $indice;
                $DepenseSimple->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $DepenseSimple->clients_entreprise_id = $indice;
                $DepenseSimple->fournisseur_id = null;
            }

            //Source de paiement
            if ($request->input('paiementsource_id')) {
                $Depense->paiementsource_id = $request->input('paiementsource_id');
                if ($Depense->paiementsource_id) {
                    $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom;
                } else {
                    $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
                }
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
            }

            $DepenseSimple->entreprise_id = $EntrepriseID;
            $DepenseSimple->date_paiement = $request->input('date_facturation');
            $DepenseSimple->reference = $request->input('reference');
            $DepenseSimple->paiements_mode_id = $request->input('paiements_mode_id');
            $DepenseSimple->note = $request->input('note');
            $DepenseSimple->depense_id = $Depense->id;
            $DepenseSimple->save();
            $Depense->depenses_simple_id = $DepenseSimple->id;
            $Depense->update();
        }


        if ($Depense->type == "cheque") {

            $Cheque = new Cheque();

            if ($nature == "F") {
                $Cheque->fournisseur_id = $indice;
                $Cheque->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Cheque->clients_entreprise_id = $indice;
                $Cheque->fournisseur_id = null;
            }


            if ($nature == "F") {
                $Cheque->adresse_postale = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Cheque->adresse_postale = ClientsEntreprise::find($indice)->adresse;
            }
            //Source de paiement
            if ($request->input('paiementsource_id')) {
                $Depense->paiementsource_id = $request->input('paiementsource_id');
                if ($Depense->paiementsource_id) {
                    $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom;
                } else {
                    $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
                }
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
            }

            $Cheque->date_paiement = $request->input('date_facturation');
            $Cheque->numero_cheque = $request->input('numero_cheque');
            $Cheque->note = $request->input('note');
            $Cheque->depense_id = $Depense->id;
            $Cheque->entreprise_id = $EntrepriseID;

            $Cheque->save();
            $Depense->cheque_id = $Cheque->id;
            $Depense->update();
        }
        if ($Depense->type == "credit") {

            $Credit = new FournisseursCredit();

            if ($nature == "F") {
                $Credit->fournisseur_id = $indice;
                $Credit->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Credit->clients_entreprise_id = $indice;
                $Credit->fournisseur_id = null;
            }
            $Credit->date_paiement = $request->input('date_paiement');
            $Credit->reference = $request->input('reference');
            $Credit->note = $request->input('note');
            $Credit->depense_id = $Depense->id;
            $Credit->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Credit->adresse_postale = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Credit->adresse_postale = ClientsEntreprise::find($indice)->adresse;
            }
            $Credit->save();
            $Depense->credit_fournisseur_id = $Credit->id;
            $Depense->update();
        }




        // Ajout des compte comptable sur la dépénses;

        if ($request->input('comptes_comptable_id')[0] != null) {
            //$zone_id = $zone->id;
            $compte_comptable = $request->input('comptes_comptable_id');
            $montant = $request->input('montant');
            $description = $request->input('description');
            $taxe_id = $request->input('taxe_id');

            foreach ($compte_comptable as $key => $n) {
                if ($compte_comptable[$key] != null || $compte_comptable[$key] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->depense_id = $Depense->id;

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->comptes_comptable_id = $compte_comptable[$key];
                    $DepensePanier->description = $description[$key];
                    $DepensePanier->montant = $montant[$key];
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id =  $EntrepriseID;


                    if ($taxe_id[$key] > 0) {
                        $Taxe = Taxe::find($taxe_id[$key]);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id[$key];
                        $DepensePanier->total = $DepensePanier->montant + (($DepensePanier->montant * $Taxe->taux) / 100);
                    }
                    if ($taxe_id[$key] < 0) {
                        $DepensePanier->taxe_id = null;
                        $DepensePanier->taux_taxe = 0;
                        $DepensePanier->montant_taxe = 0;

                        $DepensePanier->total = $DepensePanier->montant;
                    }

                    $CompteComptables = Comptescomptable::find($DepensePanier->comptes_comptable_id);
                    if ($CompteComptables) {
                        $DepensePanier->designation = $CompteComptables->nom;
                    }

                    $DepensePanier->save();
                }
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }

        if ($request->input('article_id')[0] != null) {
            //$zone_id = $zone->id;
            $article = $request->input('article_id');
            $quantite = $request->input('qte_article');
            $montant_article = $request->input('montant_article');
            $description_article = $request->input('description_article');
            $taxe_article = $request->input('taxe_article');

            foreach ($article as $key => $n) {
                if ($article[$key] != null || $article[$key] != '') {
                    # code...
                }
                $DepensePanier = new DepensesPanier();
                $DepensePanier->depense_id = $Depense->id;

                if ($nature == "F") {
                    $DepensePanier->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $DepensePanier->clients_entreprise_id = $indice;
                }

                $DepensePanier->article_id = $article[$key];
                $DepensePanier->description = $description_article[$key];
                $DepensePanier->qte = $quantite[$key];
                $DepensePanier->montant = $montant_article[$key] * $quantite[$key];
                $DepensePanier->total = 0;
                $DepensePanier->entreprise_id =  $EntrepriseID;

                if ($taxe_article[$key] > 0) {
                    $Taxe = Taxe::find($taxe_article[$key]);

                    $DepensePanier->taux_taxe = $Taxe->taux;
                    $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                    $DepensePanier->taxe_id = $taxe_article[$key];
                    $DepensePanier->total = $DepensePanier->montant + (($DepensePanier->montant * $Taxe->taux) / 100);
                }
                if ($taxe_article[$key] < 0) {
                    $DepensePanier->taxe_id = null;
                    $DepensePanier->taux_taxe = 0;
                    $DepensePanier->montant_taxe = 0;

                    $DepensePanier->total = $DepensePanier->montant;
                }

                $CompteComptables = Comptescomptable::find($DepensePanier->article_id);
                if ($CompteComptables) {
                    $DepensePanier->designation = $CompteComptables->nom;
                }

                $DepensePanier->save();
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }


        $DepensePanier = DepensesPanier::where('depense_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return back()->with('success', "Dépense ajoutée avec succès!");
    }


    public function newDepenseOnPopUpdate(Request $request)
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
            'note' => "nullable",
            'paiements_mode_id' => "nullable",
            'reference' => "nullable",
            'paiementsource_id' => "nullable",

            'comptes_comptable_id' => 'nullable',
            'description' => 'nullable',
            'montant' => 'nullable',
            'taxe_id' => 'nullable',
            'type' => 'nullable',

            'article_id' => 'nullable',
            'description_article' => 'nullable',
            'montant_article' => 'nullable',
            'taxe_article' => 'nullable',
            'qte_article' => 'nullable',


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

        //    dd($indice);
        $Depense = Depense::find($request->id);

        if ($nature == "F") {
            $Depense->fournisseur_id = $indice;
            $Depense->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Depense->clients_entreprise_id = $indice;
            $Depense->fournisseur_id = null;
        }

        //Source de paiement
        if ($request->input('paiementsource_id')) {
            $Depense->paiementsource_id = $request->input('paiementsource_id');
            if ($Depense->paiementsource_id) {
                $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom;
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
            }
        }
        else {
            $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "source introuvable" ;
        }

        $Depense->paiementsource_id = $request->input('paiementsource_id');
        $Depense->note =  $request->input('note');
        $Depense->status = "validated";
        $Depense->entreprise_id = $EntrepriseID;
        $Depense->update();

        if ($request->hasFile('fichier')) {
            $fichier =  PiecesJointe::where('depense_id',  $Depense->id)->first();
            $fichier->entreprise_id = $EntrepriseID;
            $fichier->depense_id = $Depense->id;

            if ($request->hasFile('fichier')) {

                $logo = time().'.'.$request->fichier->getClientOriginalExtension();
                $path_name = 'storage/uploads/pdf/'. date('Y')."/". date('F'). '/';

                if ($request->fichier->move($path_name, $logo)) {
                    $fichier->fichier = $path_name.$logo;
                }

            }
            $fichier->update();
        }


        if ($Depense->type == "facture") {
            $Facture = Facture::find($Depense->facture_id);
            if ($nature == "F") {
                $Facture->fournisseur_id = $indice;
                $Facture->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Facture->clients_entreprise_id = $indice;
                $Facture->fournisseur_id = null;
            }
            $Facture->date_facturation = $request->input('date_facturation');
            $Facture->echeance = $request->input('echeance');
            $Facture->numero_facture = $request->input('numero_facture');
            $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
            $Facture->message = $request->input('note');
            $Facture->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }

            //$Facture->type="depense";
            $Facture->update();



        }

        if ($Depense->type == "cheque") {
            $Cheque = Cheque::find($Depense->cheque_id);

            if ($Depense->fournisseur_id > 0) {
                $Cheque->fournisseur_id = $Depense->fournisseur_id;
                $Cheque->clients_entreprise_id = null;
            } elseif ($Depense->clients_entreprise_id) {
                $Cheque->clients_entreprise_id = $Depense->clients_entreprise_id;
                $Cheque->fournisseur_id = null;
            }

            $Cheque->date_paiement = $request->input('date_facturation');
            $Cheque->numero_cheque = $request->input('numero_cheque');
            $Cheque->note = $request->input('note');
            $Cheque->depense_id = $Depense->id;
            $Cheque->entreprise_id = $EntrepriseID;


            if ($nature == "F") {
                $Cheque->adresse_postale = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Cheque->adresse_postale = ClientsEntreprise::find($indice)->adresse;
            }

            $Cheque->update();
        }

        if ($Depense->type == "depense") {
            $DepenseSimple = DepensesSimple::find($Depense->depenses_simple_id);
            //$DepenseSimple->fournisseur_id = 0;
            //$DepenseSimple->clients_entreprise_id = 0;

            if ($Depense->fournisseur_id > 0) {
                $DepenseSimple->fournisseur_id = $Depense->fournisseur_id;
                $DepenseSimple->clients_entreprise_id = null;
            } elseif ($Depense->clients_entreprise_id) {
                $DepenseSimple->clients_entreprise_id = $Depense->clients_entreprise_id;
                $DepenseSimple->fournisseur_id = null;
            }


            $DepenseSimple->entreprise_id = $EntrepriseID;
            $DepenseSimple->date_paiement = $request->input('date_paiement');
            $DepenseSimple->reference = $request->input('reference');
            $DepenseSimple->paiements_mode_id = $request->input('paiements_mode_id');
            $DepenseSimple->note = $request->input('note');
            $DepenseSimple->depense_id = $Depense->id;
            $DepenseSimple->update();
        }

        if ($Depense->type == "credit") {

            $Credit = FournisseursCredit::find($Depense->credit_fournisseur_id);

            if ($nature == "F") {
                $Credit->fournisseur_id = $indice;
                $Credit->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Credit->clients_entreprise_id = $indice;
                $Credit->fournisseur_id = null;
            }
            $Credit->date_paiement = $request->input('date_paiement');
            $Credit->reference = $request->input('reference');
            $Credit->note = $request->input('note');
            $Credit->depense_id = $Depense->id;
            $Credit->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Credit->adresse_postale = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Credit->adresse_postale = ClientsEntreprise::find($indice)->adresse;
            }
            $Credit->update();
        }

        // Ajout des compte comptable sur la dépénses;
        if ($request->input('comptes_comptable_id')) {
            //$zone_id = $zone->id;
            $compte_comptable = $request->input('comptes_comptable_id');
            $montant = $request->input('montant');
            $description = $request->input('description');
            $taxe_id = $request->input('taxe_id');

            foreach ($compte_comptable as $key => $n) {
                if ($compte_comptable[$key] != null || $compte_comptable[$key] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->depense_id = $Depense->id;


                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->comptes_comptable_id = $compte_comptable[$key];
                    $DepensePanier->description = $description[$key];
                    $DepensePanier->montant = $montant[$key];
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id = $EntrepriseID;
                    if ($taxe_id[$key] > 0) {
                        $Taxe = Taxe::find($taxe_id[$key]);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id[$key];
                        $DepensePanier->total = $DepensePanier->montant + (($DepensePanier->montant * $Taxe->taux) / 100);
                    }
                    if ($taxe_id[$key] < 0) {
                        $DepensePanier->taxe_id = null;
                        $DepensePanier->taux_taxe = 0;
                        $DepensePanier->montant_taxe = 0;

                        $DepensePanier->total = $DepensePanier->montant;
                    }

                    $CompteComptables = Comptescomptable::find($DepensePanier->comptes_comptable_id);
                    $DepensePanier->designation = $CompteComptables->nom ?? 'introuvable';
                    $DepensePanier->save();
                }
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }

        if ($request->input('article_id')) {
            //$zone_id = $zone->id;
            $article = $request->input('article_id');
            $quantite = $request->input('qte_article');
            $montant_article = $request->input('montant_article');
            $description = $request->input('description_article');
            $taxe_id = $request->input('taxe_article');

            foreach ($article as $key => $n) {
                if ($article[$key] != null ||  $article[$key] != '') {
                    $DepensePanier = new DepensesPanier();
                    $DepensePanier->depense_id = $Depense->id;

                    if ($nature == "F") {
                        $DepensePanier->fournisseur_id = $indice;
                    } elseif ($nature == "C") {
                        $DepensePanier->clients_entreprise_id = $indice;
                    }

                    $DepensePanier->article_id = $article[$key] ?? 0;
                    $DepensePanier->description = $description[$key] ?? 0;
                    $DepensePanier->qte = $quantite[$key] ?? 0;
                    $DepensePanier->montant = $montant_article[$key] * $DepensePanier->qte;
                    $DepensePanier->total = 0;
                    $DepensePanier->entreprise_id =  $EntrepriseID;

                    if ($taxe_id[$key] > 0) {
                        $Taxe = Taxe::find($taxe_id[$key]);

                        $DepensePanier->taux_taxe = $Taxe->taux;
                        $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                        $DepensePanier->taxe_id = $taxe_id[$key];
                        $DepensePanier->total = $DepensePanier->montant + $DepensePanier->montant_taxe;
                    }
                    if ($taxe_id[$key] < 0) {
                        $DepensePanier->taxe_id = null;
                        $DepensePanier->taux_taxe = 0;
                        $DepensePanier->montant_taxe = 0;

                        $DepensePanier->total = $DepensePanier->montant;
                    }

                    $CompteComptables = Comptescomptable::find($DepensePanier->article_id);
                    if ($CompteComptables) {
                        $DepensePanier->designation = $CompteComptables->nom;
                    }

                    $DepensePanier->save();
                }
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }



        $DepensePanier = DepensesPanier::where('depense_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return back()->with('success', "Dépense modifiée avec succès!");
    }



    public function getData()
    {
        $CompteComptables = Comptescomptable::all();
        $Taxes = Taxe::all();
        return response()->json([$CompteComptables, $Taxes]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function newDepenseFacture($id)
    {

        $Clients = ClientsEntreprise::all();
        $Fournisseurs = Fournisseur::all();
        $CompteComptables = Comptescomptable::all();
        $PageName = "Nouvelle facture à payer";
        $Modalites = PaiementsModalite::all();
        $Taxes = Taxe::all();
        $DevisesMonetaires = DevisesMonetaire::all();
        $ComptesComptables = Comptescomptable::all();
        $ModesPaiements = PaiementsMode::all();
        $DepensePaniers = DepensesPanier::with(['taxe', 'comptesComptable'])->where('depense_id', $id)->get();

        $Depense = Depense::with([
            'facture',
            'depensesPaniers',
            'fournisseur',
            'cheque',
            'depensesSimple',
            'creditFournisseurs',
            'piecesJointes',

        ])->where('id', $id)->first();

        if ($Depense->facture_id !== null) {
            $Facture = Facture::find($Depense->facture_id);
        } else {
            $Facture = null;
        }

        return $Depense;
        return response()->json([
            'depensePanier' => $DepensePaniers,
            'depense' =>  $Depense,
        ]);




        return view('entreprise.depenses.depenses.facture.new', compact('Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'Modalites', 'Taxes', 'DepensePaniers', 'Depense', 'Facture', 'DevisesMonetaires', 'ComptesComptables', 'ModesPaiements'));
    }
    public function newDepenseSimple($id)
    {
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        $Clients = ClientsEntreprise::all();
        $Fournisseurs = Fournisseur::all();
        $CompteComptables = Comptescomptable::all();
        $PageName = "Nouvelle dépense";
        $ModePaiements = PaiementsMode::all();
        $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
        $Taxes = Taxe::all();

        $DepensePaniers = DepensesPanier::where('depense_id', $id)->get();
        $Depense = Depense::find($id);
        $DepenseSimple = DepensesSimple::find($Depense->depenses_simple_id);
        // dd($Depense->facture_id);
        $DepensePanier = DepensesPanier::where('facture_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return view('entreprise.depenses.depenses.depenseSimple.new', compact('Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'ModePaiements', 'SourcesPaiement', 'DepensePaniers', 'Depense', 'DepenseSimple', 'Taxes'));
    }

    public function newDepenseCheque($id)
    {
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Clients = ClientsEntreprise::all();
        $Fournisseurs = Fournisseur::all();
        $CompteComptables = Comptescomptable::all();
        $PageName = "Nouveau Chèque";
        $ModePaiements = PaiementsMode::all();
        $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
        $Taxes = Taxe::all();
        $DepensePaniers = DepensesPanier::where('depense_id', $id)->get();
        $Depense = Depense::find($id);
        $Cheque = Cheque::find($Depense->cheque_id);
        // dd($Depense->facture_id);
        $DepensePanier = DepensesPanier::where('facture_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return view('entreprise.depenses.depenses.cheque.new', compact('Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'ModePaiements', 'SourcesPaiement', 'DepensePaniers', 'Depense', 'Cheque', 'Taxes'));
    }
    public function newDepenseCreditFournisseur($id)
    {
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }
        $Clients = ClientsEntreprise::all();
        $Fournisseurs = Fournisseur::all();
        $CompteComptables = Comptescomptable::all();
        $PageName = "Nouveau crédit fournisseur";
        $ModePaiements = PaiementsMode::all();
        $SourcesPaiement = Paiementsource::where('entreprise_id', $EntrepriseID)->get();
        $Taxes = Taxe::all();
        $DepensePaniers = DepensesPanier::where('depense_id', $id)->get();
        $Depense = Depense::find($id);
        $CreditFournisseur = FournisseursCredit::find($Depense->credit_fournisseur_id);
        // dd($Depense->facture_id);
        $DepensePanier = DepensesPanier::where('facture_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return view('entreprise.depenses.depenses.creditFournisseurs.new', compact('Clients', 'Fournisseurs', 'CompteComptables', 'PageName', 'ModePaiements', 'SourcesPaiement', 'DepensePaniers', 'Depense', 'CreditFournisseur', 'Taxes'));
    }

    public function newDraftDepense($id)
    {
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        $Draft = new Depense();
        $Draft->entreprise_id = $EntrepriseID;
        if ($id == 1) {
            $Draft->type = "facture";
            $Draft->save();
            return redirect(route('entreprise.depense.new.facture', $Draft->id))->with('success', "Brouillon créé avec succès");
        } elseif ($id == 2) {
            $Draft->type = "depense";
            $Draft->save();
            return redirect(route('entreprise.depense.new.depense', $Draft->id))->with('success', "Brouillon créé avec succès");
        } elseif ($id == 3) {
            $Draft->type = "cheque";
            $Draft->save();
            return redirect(route('entreprise.depense.new.cheque', $Draft->id))->with('success', "Brouillon créé avec succès");
        } elseif ($id == 4) {
            $Draft->type = "credit";
            $Draft->save();
            return redirect(route('entreprise.depense.new.creditFournisseurs', $Draft->id))->with('success', "Brouillon créé avec succès");
        }
        //elseif ($id === 3) {
        //     $type = "Chèque";
        // }elseif ($id === 4) {
        //     $type = "Crédit Fournisseur";
        // }
    }
    public function addCategorytoDepense(Request $request)
    {
        $this->validate($request, [
            'comptes_comptable_id' => 'required',
            'description' => 'nullable',
            'montant' => 'nullable',
            'taxe_id' => 'nullable',
            'depense_id' => 'required',

        ]);

        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        $DepensePanier = new DepensesPanier();
        $DepensePanier->depense_id = $request->input('depense_id');
        $DepensePanier->clients_entreprise_id = $request->input('clients_entreprise_id');
        $DepensePanier->fournisseur_id = $request->input('fournisseur_id');
        $DepensePanier->comptes_comptable_id = $request->input('comptes_comptable_id');
        $DepensePanier->description = $request->input('description');
        $DepensePanier->montant = $request->input('montant');
        $DepensePanier->total = 0;
        $DepensePanier->entreprise_id =  $EntrepriseID;

        if ($request->input('taxe_id') > 0) {
            $Taxe = Taxe::find($request->input('taxe_id'));

            $DepensePanier->taux_taxe = $Taxe->taux;
            $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
            $DepensePanier->taxe_id = $request->input('taxe_id');
            $DepensePanier->total = $DepensePanier->montant + (($DepensePanier->montant * $Taxe->taux) / 100);
        }
        if ($request->input('taxe_id') < 0) {
            $DepensePanier->taxe_id = null;
            $DepensePanier->taux_taxe = 0;
            $DepensePanier->montant_taxe = 0;

            $DepensePanier->total = $DepensePanier->montant;
        }

        $CompteComptables = Comptescomptable::find($DepensePanier->comptes_comptable_id);
        $DepensePanier->designation = $CompteComptables->nom;
        $DepensePanier->save();
        $Depense  = Depense::find($request->input('depense_id'));
        $DepensePanier = DepensesPanier::where('depense_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
        return back()->with('success', "Catégorie ajoutée avec succès sur la facture !");
    }

    public function changeDepenseSatus(Request $request, $id)
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
            'note' => "nullable",
            'paiements_mode_id' => "nullable",
            'reference' => "nullable",
            'paiementsource_id' => "nullable",

            'comptes_comptable_id' => 'required',
            'description' => 'nullable',
            'montant' => 'nullable',
            'taxe_id' => 'nullable',


        ]);

        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);

        //dd($request->all());
        if ($request->input('comptes_comptable_id')) {
            //$zone_id = $zone->id;
            $compte_comptable = $request->input('comptes_comptable_id');
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

            foreach ($compte_comptable as $key => $n) {
                $DepensePanier = new DepensesPanier();
                $DepensePanier->depense_id = $id;

                if ($nature == "F") {
                    $DepensePanier->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $DepensePanier->clients_entreprise_id = $indice;
                }

                $DepensePanier->comptes_comptable_id = $compte_comptable[$key];
                $DepensePanier->description = $description[$key];
                $DepensePanier->montant = $montant[$key];
                $DepensePanier->total = 0;
                $DepensePanier->entreprise_id =  $EntrepriseID;

                if ($taxe_id[$key] > 0) {
                    $Taxe = Taxe::find($taxe_id[$key]);

                    $DepensePanier->taux_taxe = $Taxe->taux;
                    $DepensePanier->montant_taxe = (($DepensePanier->montant * $Taxe->taux) / 100);
                    $DepensePanier->taxe_id = $taxe_id[$key];
                    $DepensePanier->total = $DepensePanier->montant + (($DepensePanier->montant * $Taxe->taux) / 100);
                }
                if ($taxe_id[$key] < 0) {
                    $DepensePanier->taxe_id = null;
                    $DepensePanier->taux_taxe = 0;
                    $DepensePanier->montant_taxe = 0;

                    $DepensePanier->total = $DepensePanier->montant;
                }

                $CompteComptables = Comptescomptable::find($DepensePanier->comptes_comptable_id);
                $DepensePanier->designation = $CompteComptables->nom;
                $DepensePanier->save();
            }

            //return back()->with('success', 'Zone de livraison ajouté avec succès');
        }
        //dd($request->input('comptes_comptable_id'));


        //dd($request->all());

        $Depense = Depense::find($id);
        // dd($request->input('paiementsource_id'));

        if ($request->input('paiementsource_id')) {

            $Depense->paiementsource_id = $request->input('paiementsource_id');

            if ($Depense->paiementsource_id) {
                $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom;
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom;
            }
        } else {
            $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom;
        }

        $Depense->paiementsource_id = $request->input('paiementsource_id');
        // dd($request->input('paiements_mode_id'));

        if ($Depense->paiementsource_id) {
            $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom;
        } else {
            $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom;
        }

        $Depense->note =  $request->input('note');
        $Depense->status = "validated";
        $nature = substr_replace($request->input('fournisseur') ?? "", "", 1);
        $indice = (int) filter_var($request->input('fournisseur'), FILTER_SANITIZE_NUMBER_INT);
        // dd($indice);
        if ($nature == "F") {
            $Depense->fournisseur_id = $indice;
        } elseif ($nature == "C") {
            $Depense->clients_entreprise_id = $indice;
        }
        $DepensePanier = DepensesPanier::where('depense_id', $id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;

        if ($Depense->type == "facture") {
            // dd($request->input('date_facturation'));
            if ($Depense->facture_id) {
                $Facture =  Facture::find($Depense->facture_id);
                if ($nature == "F") {

                    $Facture->fournisseur_id = $indice;
                } elseif ($nature == "C") {

                    $Facture->clients_entreprise_id = $indice;
                }

                $Facture->fournisseur_id = $Depense->fournisseur_id;
                $Facture->date_facturation = $request->input('date_facturation');
                $Facture->echeance = $request->input('echeance');
                $Facture->numero_facture = $request->input('numero_facture');
                $Facture->adresse_facturation = $request->input('adresse_facturation');
                $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
                $Facture->message = $request->input('note');
                $Facture->type = "depense";
                $Facture->update();
                $Depense->facture_id = $Facture->id;
                $Depense->update();
            } else {


                $Facture = new Facture();
                if ($nature == "F") {
                    $Facture->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $Facture->clients_entreprise_id = $indice;
                }
                $Facture->date_facturation = $request->input('date_facturation');
                $Facture->echeance = $request->input('echeance');
                $Facture->numero_facture = $request->input('numero_facture');
                $Facture->adresse_facturation = $request->input('adresse_facturation');
                $Facture->paiements_modalite_id = $request->input('paiements_modalite_id');
                $Facture->message = $request->input('note');
                $Facture->entreprise_id = $EntrepriseID;

                $Facture->type = "depense";
                $Facture->save();
                $Depense->facture_id = $Facture->id;
                $Depense->update();
            }
            return back()->with('success', "Facture à payer mise à jour avec succès sur la facture !");
        }


        if ($Depense->type == "depense") {

            if ($Depense->depenses_simple_id) {
                $DepenseSimple =  DepensesSimple::find($Depense->depenses_simple_id);
                // dd($Depense->depenses_simple_id);
                $DepenseSimple->fournisseur_id = 0;
                $DepenseSimple->clients_entreprise_id = 0;
                if ($nature == "F") {
                    $DepenseSimple->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $DepenseSimple->clients_entreprise_id = $indice;
                }
                $DepenseSimple->date_paiement = $request->input('date_paiement');
                $DepenseSimple->reference = $request->input('reference');
                $DepenseSimple->paiements_mode_id = $request->input('paiements_mode_id');
                $DepenseSimple->note = $request->input('note');
                $DepenseSimple->depense_id = $id;
                $DepenseSimple->update();
                $Depense->update();
            } else {

                $DepenseSimple = new DepensesSimple();
                $DepenseSimple->fournisseur_id = 0;
                $DepenseSimple->clients_entreprise_id = 0;
                if ($nature == "F") {
                    $DepenseSimple->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $DepenseSimple->clients_entreprise_id = $indice;
                }
                $DepenseSimple->date_paiement = $request->input('date_paiement');
                $DepenseSimple->reference = $request->input('reference');
                $DepenseSimple->paiements_mode_id = $request->input('paiements_mode_id');
                $DepenseSimple->note = $request->input('note');
                $DepenseSimple->depense_id = $id;

                $DepenseSimple->save();
                $Depense->depenses_simple_id = $DepenseSimple->id;
                $Depense->update();
            }
            return back()->with('success', "Dépense mise à jour avec succès sur la facture !");
        }

        if ($Depense->type == "cheque") {
            if ($Depense->cheque_id) {
                $Cheque =  Cheque::find($Depense->cheque_id);
                // dd($Depense->depenses_simple_id);

                if ($nature == "F") {

                    $Cheque->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $Cheque->clients_entreprise_id = $indice;
                }
                // dd($request->input('adresse_postale'));
                $Cheque->date_paiement = $request->input('date_paiement');
                $Cheque->numero_cheque = $request->input('numero_cheque');
                $Cheque->adresse_postale = $request->input('adresse_postale');
                $Cheque->note = $request->input('note');
                $Cheque->depense_id = $id;

                $Cheque->update();
                $Depense->update();
            } else {

                $Cheque = new Cheque();

                if ($nature == "F") {
                    $Cheque->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $Cheque->clients_entreprise_id = $indice;
                }
                $Cheque->date_paiement = $request->input('date_paiement');
                $Cheque->numero_cheque = $request->input('numero_cheque');
                $Cheque->adresse_postale = $request->input('adresse_postale');
                $Cheque->note = $request->input('note');
                $Cheque->depense_id = $id;


                $Cheque->save();
                $Depense->cheque_id = $Cheque->id;
                $Depense->update();
            }
            return back()->with('success', "Chèque mise à jour avec succès sur la facture !");
        }
        if ($Depense->type == "credit") {
            // dd($request->input('date_paiement'));
            if ($Depense->credit_fournisseur_id) {
                $Credit =  FournisseursCredit::find($Depense->credit_fournisseur_id);
                // dd($Depense->depenses_simple_id);

                if ($nature == "F") {
                    $Credit->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $Credit->clients_entreprise_id = $indice;
                }
                // dd($request->input('adresse_postale'));
                $Credit->date_paiement = $request->input('date_paiement');
                $Credit->reference = $request->input('reference');
                $Credit->adresse_postale = $request->input('adresse_postale');
                $Credit->note = $request->input('note');
                $Credit->depense_id = $id;

                $Credit->update();
                $Depense->update();
            } else {

                $Credit = new FournisseursCredit();

                if ($nature == "F") {
                    $Credit->fournisseur_id = $indice;
                } elseif ($nature == "C") {
                    $Credit->clients_entreprise_id = $indice;
                }
                $Credit->date_paiement = $request->input('date_paiement');
                $Credit->reference = $request->input('reference');
                $Credit->adresse_postale = $request->input('adresse_postale');
                $Credit->note = $request->input('note');
                $Credit->depense_id = $id;
                $Credit->save();
                $Depense->credit_fournisseur_id = $Credit->id;
                $Depense->update();
            }

            return back()->with('success', "Chèque mise à jour avec succès sur la facture !");
        }
    }

    /**
     * @param \App\Http\Requests\DepenseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'entreprise_id' => 'required',
            'client_id' => 'nullable',
            'fournisseur_id' => 'nullable',
            'depenses_simple_id' => 'nullable',
            'factue_id' => 'nullable',
            'cheque_id' => 'nullable',
            'credit_fournisseur_id' => 'nullable',
            'note' => 'nullable',
            'type' => 'required',
        ]);
        $EntrepriseID = 0;
        if (Auth::user()->role == "cabinet" && SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', Auth::user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = Auth::user()->entreprise_id;
        }

        $Depense = new Depense();
        $Depense->entreprise_id = $EntrepriseID;
        $Depense->client_id = $request->input('client_id');
        $Depense->fournisseur_id = $request->input('fournisseur_id');
        $Depense->depenses_simple_id = $request->input('depenses_simple_id');
        $Depense->factue_id = $request->input('factue_id');
        $Depense->cheque_id = $request->input('cheque_id');
        $Depense->credit_fournisseur_id = $request->input('credit_fournisseur_id');
        $Depense->note = $request->input('note');
        $Depense->save();
        return redirect(route('depenses.index'))->with('success', "Fournisseur ajouté avec succès !");
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Depense $depense)
    {
        $this->authorize('view', $depense);

        return view('app.depenses.show', compact('depense'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Depense $depense)
    {
        $this->authorize('update', $depense);

        $entreprises = Entreprise::pluck('nom_entreprise', 'id');
        $paiementsModes = PaiementsMode::pluck('nom', 'id');

        return view(
            'app.depenses.edit',
            compact('depense', 'entreprises', 'paiementsModes')
        );
    }

    /**
     * @param \App\Http\Requests\DepenseUpdateRequest $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function update(DepenseUpdateRequest $request, Depense $depense)
    {
        $this->authorize('update', $depense);

        $validated = $request->validated();

        $depense->update($validated);

        return redirect()
            ->route('depenses.edit', $depense)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Depense $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Depense = Depense::find($id);
        if ($Depense->type == "depense") {
            if (DepensesSimple::find($Depense->depenses_simple_id)) {
                DepensesSimple::find($Depense->depenses_simple_id)->delete();
            }
            DepensesPanier::where('depense_id', $Depense->id)->delete();
            Depense::find($id)->delete();
            return redirect(route('depenses.index'))->with('success', "Dépense supprimée avec succés");
            //illugraphic CodeLab :)
        } elseif ($Depense->type == "facture") {
            if (Facture::find($Depense->facture_id)) {
                Facture::find($Depense->facture_id)->delete();
            }

            DepensesPanier::where('depense_id', $Depense->id)->delete();
            Depense::find($id)->delete();
            return redirect(route('depenses.index'))->with('success', "Dépense supprimée avec succés");
        } elseif ($Depense->type == "cheque") {
            if (Cheque::find($Depense->cheque_id)) {
                Cheque::find($Depense->cheque_id)->delete();
            }

            DepensesPanier::where('depense_id', $Depense->id)->delete();
            Depense::find($id)->delete();
            return redirect(route('depenses.index'))->with('success', "Dépense supprimée avec succés");
        } elseif ($Depense->type == "credit") {
            if (FournisseursCredit::find($Depense->credit_fournisseur_id)) {
                FournisseursCredit::find($Depense->credit_fournisseur_id)->delete();
            }

            DepensesPanier::where('depense_id', $Depense->id)->delete();
            Depense::find($id)->delete();
            return redirect(route('depenses.index'))->with('success', "Dépense supprimée avec succés");
        }
    }
}
