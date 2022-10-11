<?php

namespace Modules\Depense\Http\Controllers;

use App\Models\Article;
use App\Models\Cheque;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\Control;
use App\Models\Depense;
use App\Models\DepensesPanier;
use App\Models\DepensesSimple;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\FournisseursCredit;
use App\Models\Paiementsource;
use App\Models\PiecesJointe;
use App\Models\SessionControl;
use App\Models\Taxe;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepenseController extends Controller
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
        return view('depense::index', compact('PageName', 'Session'));
    }

    public function addNewComptePaiement($data)
    {
        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        } else {
            $EntrepriseID = auth()->user()->entreprise_id;
        }
        $comptePaiement=new Paiementsource();
        $comptePaiement->entreprise_id = $EntrepriseID;
        $comptePaiement->type = $data['type'] ?? '';
        $comptePaiement->nom = $data['nom'] ?? '';
        $comptePaiement->solde = $data['solde'] ?? '';
        $comptePaiement->numero_compte = $data['numero_compte'] ?? '';
        $comptePaiement->is_default = $data['is_default'] ?? '';
        $comptePaiement->save();



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
        $Article->prix_unitaire = $data['prix_unitaire'] ?? '';
        $Article->stock = $data['stock'] ?? '';
        $Article->comptes_comptable_id = $data['comptes_comptable_id'] ?? '';
        $Article->taxe_id = $data['taxe_id'] ?? '';
        $Article->nom = $data['nom'] ?? '';

        $Article->save();
    }


        public function addNewProduit_HS($data)
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
            $Article->nom = $data['nom_produit'] ?? '';
            $Article->type = "produit";
            $Article->save();
        }
        public function addNewService($data)
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
            $Article->nom = $data['nom_service'] ?? '';
            $Article->type = "service";
            $Article->save();
        }

        public function addNewStock($data)
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
            $Article->nom = $data['nom_stock'] ?? '';
            $Article->type = "stock";
            $Article->comptes_comptable_id = $data['comptes_comptable_default'] ?? null;
            $Article->comptes_achat_id = $data['comptes_achat_id'] ?? null;
            $Article->prix_achat = $data['prix_achat'] ?? null;
            $Article->stock = $data['qte_stock'] ?? null;
            $Article->qte_initiale = $data['qte_initiale'] ?? null;
            $Article->prix_unitaire = $data['prix_unitaire_stock'] ?? null;
            $Article->comptes_vente_id = $data['comptes_vente_id'] ?? null;
            $Article->date_debut_stock = $data['date_debut_stock'] ?? null;
            $Article->save();
        }

    public function addNewClient($data)
    {
        if ($data['clientType'] == "client") {
            $ClientsEntreprise = new ClientsEntreprise();
            $ClientsEntreprise->paiements_mode_id = $data['paiements_mode_id'];
        }elseif ($data['clientType'] == "fournisseur") {
            $ClientsEntreprise = new Fournisseur();
        }


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
        // $ClientsEntreprise->devises_monetaire_id = $data['devises_monetaire_id'];

        $ClientsEntreprise->save();
    }


    public function addNewCompteComptable($data)
    {
        $EntrepriseID = 0;
        if (auth()->user()->role == "cabinet" && SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first()) {
            $Session = SessionControl::where('entreprise_id', auth()->user()->entreprise_id)->where('status', "valide")->first();
            $EntrepriseID = Control::find($Session->control_id)->entreprise_controled_id;
        }else {
            $EntrepriseID =auth()->user()->entreprise_id;
        }
        $Comptescomptable = new Comptescomptable();
        $Comptescomptable->entreprise_id= $EntrepriseID;
        $Comptescomptable->numero_compte=$data['numero_compte'];
        $Comptescomptable->nom=$data['nom'];
        $Comptescomptable->type_compte=$data["type_compteID"];
        $Comptescomptable->sous_type_compte=$data["sous_type_compteID"];
        $Comptescomptable->save();
    }

    public function depenseFactureSave($data)
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


        $Depense = new Depense();

        if ($data['type'] == "facture") {
            $Depense->type = "facture";
        } elseif ($data['type'] == "depense") {
            $Depense->type = "depense";
        } elseif ($data['type'] == "cheque") {
            $Depense->type = "cheque";
        } elseif ($data['type'] == "credit") {
            $Depense->type = "credit";
        }

        if ($nature == "F") {
            $Depense->fournisseur_id = $indice;
            $Depense->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Depense->clients_entreprise_id = $indice;
            $Depense->fournisseur_id = null;
        }

        //Source de paiement
        if (array_key_exists('paiementsource_id', $data) ) {
            $Depense->paiementsource_id = $data['paiementsource_id'];
            if ($Depense->paiementsource_id) {
                $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom ?? 'introuvable';
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
            }
        }
        else {
            $Depense->paiementsource_id = null;
            $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "source introuvable" ;
        }


        $Depense->note =  $data['note'];
        $Depense->status = "validated";
        $Depense->entreprise_id = $EntrepriseID;
        $Depense->save();


        if ($Depense->type == "facture") {
            $Facture = new Facture();
            if ($nature == "F") {
                $Facture->fournisseur_id = $indice;
                $Facture->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Facture->clients_entreprise_id = $indice;
                $Facture->fournisseur_id = null;
            }
            $Facture->date_facturation = $data['date_facturation'];
            $Facture->echeance = $data['echeance'];
            $Facture->numero_facture = $data['numero_facture'];
            $Facture->paiements_modalite_id = $data['paiements_modalite_id'];
            $Facture->message = $data['note'];
            $Facture->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse;
            }

            $Facture->type = "depense";
            $Facture->save();
            $Depense->facture_id = $Facture->id;
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
                $Cheque->adresse_postale = Fournisseur::find($indice)->adresse ?? '';
            } elseif ($nature == "C") {
                $Cheque->adresse_postale = ClientsEntreprise::find($indice)->adresse ?? '';
            }

            $Cheque->date_paiement = $data['date_paiement'];
            $Cheque->numero_cheque = $data['numero_cheque'];
            $Cheque->note = $data['note'];
            $Cheque->depense_id = $Depense->id;
            $Cheque->entreprise_id = $EntrepriseID;


            if ($nature == "F") {
                $Cheque->adresse_postale = Fournisseur::find($indice)->adresse;
            } elseif ($nature == "C") {
                $Cheque->adresse_postale = ClientsEntreprise::find($indice)->adresse;
            }

            $Cheque->save();
            $Depense->cheque_id = $Cheque->id;
            $Depense->update();

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

            $DepenseSimple->entreprise_id = $EntrepriseID;
            $DepenseSimple->date_paiement = $data['date_paiement'];
            $DepenseSimple->reference = $data['reference'] ?? '';
            $DepenseSimple->paiements_mode_id = $data['paiements_mode_id'] ?? 0;
            $DepenseSimple->note = $data['note'] ?? '';
            $DepenseSimple->depense_id = $Depense->id;

            $DepenseSimple->save();
            $Depense->depenses_simple_id = $DepenseSimple->id;
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
            $Credit->date_paiement = $data['date_paiement'];
            $Credit->reference = $data['reference'];
            $Credit->note = $data['note'];
            $Credit->depense_id = $Depense->id;
            $Credit->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Credit->adresse_postale = Fournisseur::find($indice)->adresse ?? '';
            } elseif ($nature == "C") {
                $Credit->adresse_postale = ClientsEntreprise::find($indice)->adresse ?? '';
            }

            $Credit->save();
            $Depense->credit_fournisseur_id = $Credit->id;
            $Depense->update();
        }

        // Ajout des compte comptable sur la dépenses;
        if(array_key_exists('rowCompte', $data)){
            if (count($data['rowCompte']) > 0) {
                $compte_comptable = $data['rowCompte'];

                foreach ($compte_comptable as $key => $n) {
                    if ($compte_comptable[$key]['compte_comptable_id'] != null || $compte_comptable[$key]['compte_comptable_id'] != '') {
                        $DepensePanier = new DepensesPanier();
                        $DepensePanier->depense_id = $Depense->id;

                        if ($nature == "F") {
                            $DepensePanier->fournisseur_id = $indice;
                        } elseif ($nature == "C") {
                            $DepensePanier->clients_entreprise_id = $indice;
                        }

                        if ($compte_comptable[$key]['description'] == '') {
                            $DepensePanier->description = '-' ;
                        }else {
                            $DepensePanier->description = $compte_comptable[$key]['description'] ;
                        }
                        if ($compte_comptable[$key]['qte'] == '') {
                          $check = Article::find($compte_comptable[$key]['article_id']);
                            $DepensePanier->qte = $check->stock ?? 1 ;
                        }else {
                            $DepensePanier->qte = $compte_comptable[$key]['qte'] ;
                        }

                        if ($compte_comptable[$key]['taxe_id'] == "") {
                            $taxe_id = -1;
                        } else {
                            $taxe_id = (int)$compte_comptable[$key]['taxe_id'];
                        }

                        $DepensePanier->comptes_comptable_id = $compte_comptable[$key]['compte_comptable_id'];
                        $DepensePanier->article_id = $compte_comptable[$key]['article_id'] ?? 0;
                        //mettre à jour la table articles
                        $updatestock = Article::find($compte_comptable[$key]['article_id']);
                        $newstock = $updatestock->stock + $DepensePanier->qte;
                        $Art = Article::where('id', $compte_comptable[$key]['article_id'])->update(['stock' => $newstock]);
                        $DepensePanier->montant = $compte_comptable[$key]['montant'] ?? 1;
                        $DepensePanier->montant_ht = 0;
                        $DepensePanier->total = 0;
                        $DepensePanier->entreprise_id = $EntrepriseID;

                        if ($taxe_id > 0) {
                            $Taxe = Taxe::find($taxe_id);

                            $DepensePanier->taux_taxe = $Taxe->taux;
                            $DepensePanier->montant_ht = $DepensePanier->montant * $DepensePanier->qte;
                            $DepensePanier->montant_taxe = (($DepensePanier->montant * $DepensePanier->qte * $Taxe->taux) / 100);
                            $DepensePanier->taxe_id = $taxe_id;
                            $DepensePanier->total = $DepensePanier->montant*$DepensePanier->qte + $DepensePanier->montant_taxe;
                        }
                        if ($taxe_id < 0) {
                            $DepensePanier->taxe_id = null;
                            $DepensePanier->taux_taxe = 0;
                            $DepensePanier->montant_taxe = 0;
                            $DepensePanier->montant_ht = $DepensePanier->montant * $DepensePanier->qte;
                            $DepensePanier->total = $DepensePanier->montant*$DepensePanier->qte;
                        }

                        $CompteComptables = Comptescomptable::find($DepensePanier->comptes_comptable_id);
                        $DepensePanier->designation = $CompteComptables->nom ?? 'introuvable';
                        $DepensePanier->save();
                    }
                }

            }
        }

        if(array_key_exists('rowArticle', $data)){
            if (count($data['rowArticle']) > 0) {

                $article = $data['rowArticle'];

                foreach ($article as $key => $n) {
                    if ($article[$key]['article_id'] != null || $article[$key]['article_id'] != '') {
                        $DepensePanier = new DepensesPanier();
                        $DepensePanier->facture_id = $Depense->id;

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
                        $DepensePanier->qte = $article[$key]['qte'] ?? 1;
                        $DepensePanier->montant = floatval($article[$key]['montant']);
                        $DepensePanier->total = 0;
                        $DepensePanier->entreprise_id =  $EntrepriseID;

                        if ($taxe_id > 0) {

                            $Taxe = Taxe::find($taxe_id);

                            $DepensePanier->taux_taxe = floatval($Taxe->taux);
                            $DepensePanier->montant_taxe = (($DepensePanier->montant * $DepensePanier->qte * $Taxe->taux) / 100);
                            $DepensePanier->taxe_id = $taxe_id;
                            $DepensePanier->total = $DepensePanier->montant * $DepensePanier->qte + ($DepensePanier->montant_taxe ?? 0);
                        }
                        if ($taxe_id < 0) {
                            $DepensePanier->taxe_id = null;
                            $DepensePanier->taux_taxe = 0;
                            $DepensePanier->montant_taxe = 0;

                            $DepensePanier->total = $DepensePanier->montant * $DepensePanier->qte;
                        }

                        $CompteComptables = Article::find($DepensePanier->article_id);
                        if ($CompteComptables) {
                            $DepensePanier->designation = $CompteComptables->nom;
                        }

                        $DepensePanier->save();
                    }
                }

            }
        }

        // if(array_key_exists('fichier', $data)){
        //     $savePiece = new DepenseController;
        //     $savePiece->pieceJointeUpdate($data['fichier'], $Depense->id, $EntrepriseID);
        // }

        $DepensePanier = DepensesPanier::where('depense_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant_ht') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
    }

    public function depenseFactureUpdate($data)
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


        $Depense = Depense::find($data['IdDepense']);

        if ($nature == "F") {
            $Depense->fournisseur_id = $indice;
            $Depense->clients_entreprise_id = null;
        } elseif ($nature == "C") {
            $Depense->clients_entreprise_id = $indice;
            $Depense->fournisseur_id = null;
        }
        //dd($Depense);
        //Source de paiement
        if (array_key_exists('paiementsource_id', $data) ) {
            $Depense->paiementsource_id = $data['paiementsource_id'];
            if ($Depense->paiementsource_id) {
                $Depense->intitule_source = Paiementsource::find($Depense->paiementsource_id)->nom ?? 'introuvable';
            } else {
                $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "introuvable";
            }
        }
        else {
            $Depense->paiementsource_id = null;
            // $Depense->intitule_source = Paiementsource::where('entreprise_id', $EntrepriseID)->where('type', "caisse")->where('is_default', "default")->first()->nom ?? "source introuvable" ;
        }


        $Depense->note =  $data['note'];
        $Depense->status = "validated";
        $Depense->entreprise_id = $EntrepriseID;
        $Depense->update();


        if ($Depense->type == "facture") {
            $Facture = Facture::find($Depense->facture_id);
            if ($nature == "F") {
                $Facture->fournisseur_id = $indice;
                $Facture->clients_entreprise_id = null;
            } elseif ($nature == "C") {
                $Facture->clients_entreprise_id = $indice;
                $Facture->fournisseur_id = null;
            }
            $Facture->date_facturation = $data['date_facturation'];
            $Facture->echeance = $data['echeance'];
            $Facture->numero_facture = $data['numero_facture'];
            $Facture->paiements_modalite_id = $data['paiements_modalite_id'];
            $Facture->message = $data['note'];
            $Facture->entreprise_id = $EntrepriseID;

            if ($nature == "F") {
                $Facture->adresse_facturation = Fournisseur::find($indice)->adresse ?? '';
            } elseif ($nature == "C") {
                $Facture->adresse_facturation = ClientsEntreprise::find($indice)->adresse ?? '';
            }

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

            $Cheque->date_paiement = $data['date_paiement'];
            $Cheque->numero_cheque = $data['numero_cheque'];
            $Cheque->note = $data['note'];
            $Cheque->depense_id = $Depense->id;
            $Cheque->entreprise_id = $EntrepriseID;


            if ($nature == "F") {
                $Cheque->adresse_postale = Fournisseur::find($indice)->adresse ?? '';
            } elseif ($nature == "C") {
                $Cheque->adresse_postale = ClientsEntreprise::find($indice)->adresse ?? '';
            }

            $Cheque->update();
        }

        if ($Depense->type == "depense") {
            $DepenseSimple = DepensesSimple::find($Depense->depenses_simple_id);

            if ($Depense->fournisseur_id > 0) {
                $DepenseSimple->fournisseur_id = $Depense->fournisseur_id;
                $DepenseSimple->clients_entreprise_id = null;
            } elseif ($Depense->clients_entreprise_id) {
                $DepenseSimple->clients_entreprise_id = $Depense->clients_entreprise_id;
                $DepenseSimple->fournisseur_id = null;
            }

            $DepenseSimple->entreprise_id = $EntrepriseID;
            $DepenseSimple->date_paiement = $data['date_paiement'];
            $DepenseSimple->reference = $data['reference'];
            $DepenseSimple->paiements_mode_id = $data['paiements_mode_id'];
            $DepenseSimple->note = $data['note'];
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
            $Credit->date_paiement = $data['date_paiement'];
            $Credit->reference = $data['reference'];
            $Credit->note = $data['note'];
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
        if(array_key_exists('rowCompte', $data)){
            if (count($data['rowCompte']) > 0) {
                $compte_comptable = $data['rowCompte'];

                foreach ($compte_comptable as $key => $n) {
                    if ($compte_comptable[$key]['compte_comptable_id'] != null || $compte_comptable[$key]['compte_comptable_id'] != '') {
                        $DepensePanier = new DepensesPanier();
                        $DepensePanier->depense_id = $Depense->id;

                        if ($nature == "F") {
                            $DepensePanier->fournisseur_id = $indice;
                        } elseif ($nature == "C") {
                            $DepensePanier->clients_entreprise_id = $indice;
                        }

                        if ($compte_comptable[$key]['description'] == '') {
                            $DepensePanier->description = '-' ;
                        }else {
                            $DepensePanier->description = $compte_comptable[$key]['description'] ;
                        }

                        if ($compte_comptable[$key]['taxe_id'] == "") {
                            $taxe_id = -1;
                        } else {
                            $taxe_id = (int)$compte_comptable[$key]['taxe_id'];
                        }

                        $DepensePanier->comptes_comptable_id = $compte_comptable[$key]['compte_comptable_id'];
                        $DepensePanier->article_id = $compte_comptable[$key]['article_id'] ?? 0;
                        $DepensePanier->montant = floatval($compte_comptable[$key]['montant']);
                        $DepensePanier->total = 0;
                        $DepensePanier->entreprise_id = $EntrepriseID;

                        if ($taxe_id > 0) {
                            $Taxe = Taxe::find($taxe_id);

                            $DepensePanier->taux_taxe = $Taxe->taux;
                            $DepensePanier->montant_taxe = floatval(($DepensePanier->montant * $Taxe->taux) / 100);
                            $DepensePanier->taxe_id = $taxe_id;
                            $DepensePanier->total = $DepensePanier->montant + $DepensePanier->montant_taxe;
                        }
                        if ($taxe_id < 0) {
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
        }

        if(array_key_exists('rowArticle', $data)){
            if (count($data['rowArticle']) > 0) {

                $article = $data['rowArticle'];

                foreach ($article as $key => $n) {
                    if ($article[$key]['article_id'] != null || $article[$key]['article_id'] != '') {
                        $DepensePanier = new DepensesPanier();
                        $DepensePanier->depense_id = $Depense->id;

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
                        $DepensePanier->montant = floatval($article[$key]['montant']);
                        $DepensePanier->total = 0;
                        $DepensePanier->entreprise_id =  $EntrepriseID;

                        if ($taxe_id > 0) {

                            $Taxe = Taxe::find($taxe_id);

                            $DepensePanier->taux_taxe = $Taxe->taux;
                            $DepensePanier->montant_taxe = floatval(($DepensePanier->montant * $Taxe->taux) / 100);
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

            }
        }



        $DepensePanier = DepensesPanier::where('depense_id', $Depense->id)->get();
        $Depense->total = $DepensePanier->sum('total') ?? 0;
        $Depense->total_sans_taxe = $DepensePanier->sum('montant') ?? 0;
        $Depense->taxe = $DepensePanier->sum('montant_taxe') ?? 0;
        $Depense->update();
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
        return view('depense::create');
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
        return view('depense::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('depense::edit');
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
