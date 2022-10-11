<?php

namespace Modules\Depense\Http\Livewire\DepenseSimple;

use App\Http\Controllers\DepensesPanierController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Modules\Depense\Http\Controllers\DepenseController;

class Update extends Component
{
    public $fournisseur, $date_paiement, $reference, $note, $fichier, $paiements_modalite_id;
    public $taxe, $total_sans_taxe, $total, $totalHaut, $IdDepense, $echeance, $paiementsource_id, $paiements_mode_id;
    public $DepenseData, $taxes, $pieceJointe;
    public $allCompteFetched = [], $allArticleFetched = [];
    public $rowCompte = [], $rowArticle = [];

    protected $listeners = [
        'getDepenseData',
        'deleteCompteDepense'
    ];

    public function getDepenseData($id, $action = null)
    {
        $Depense = getDepenseById($id);
        $this->DepenseData = $Depense;
        $this->taxes = getDepenseDataBySession()['Taxes'];
        //dd($Depense);
        if ($Depense->depensesSimple->clients_entreprise_id > 0) {
            $this->fournisseur = "C".$Depense->depensesSimple->clients_entreprise_id ?? '';
        }elseif ($Depense->depensesSimple->fournisseur_id > 0) {
            $this->fournisseur = "F".$Depense->depensesSimple->fournisseur_id ?? '';
        }

        $this->IdDepense = $Depense->id;
        $this->date_paiement = $Depense->depensesSimple->date_paiement;
        //$this->echeance = $Depense->depensesSimple->echeance;
        //$this->paiements_modalite_id = $Depense->depensesSimple->paiements_modalite_id;
        $this->reference = $Depense->depensesSimple->reference;
        $this->note = $Depense->note;
        $this->paiementsource_id = $Depense->paiementsource_id;
        $this->paiements_mode_id = $Depense->depensesSimple->paiements_mode_id;
        $this->pieceJointe = $Depense->piecesJointes[0]->fichier ?? "";
        $this->taxe = $Depense->taxe;
        $this->total_sans_taxe = $Depense->total_sans_taxe;
        $this->total = $Depense->total;
        $this->totalHaut = getCurrency()->sigle." ".$Depense->total;
        $this->allCompteFetched = $Depense->depensesPaniers;
        $this->allArticleFetched = $Depense->depensesPaniers;
    }

    public function rules()
    {
        return [
            'fournisseur' => 'required',
            'date_paiement' => 'nullable|date:Y-m-d',
            'reference' => "nullable",
            'note' => "nullable",
            'taxe' => "nullable",
            'total_sans_taxe' => "nullable",
            'total' => "nullable",
        ];
    }


    public function openModalExpress($nom)
    {
        if ($nom == 'compte') {
            $this->emit('openExpressWithUpdate', $this->IdDepense, 'depense', 'compte', 'update');
        }elseif ($nom == 'client') {
            $this->emit('openExpressWithUpdate', $this->IdDepense, 'depense', 'client', 'update');
        }elseif ($nom == 'article') {
            $this->emit('openExpressWithUpdate', $this->IdDepense, 'depense', 'article', 'update');
        }
    }

    public function addRow()
    {
        $this->rowCompte[] = [
            'compte_comptable_id' => '',
            'montant' => 0,
            'description' => '',
            'qte' => 1,
            'taxe_id' => '',
            'total' => 0,
        ];
    }

    public function deleteRow($rowId)
    {
        $taxe = $this->rowCompte[$rowId]['total'] - $this->rowCompte[$rowId]['montant'];
        $this->total_sans_taxe = $this->total_sans_taxe - $this->rowCompte[$rowId]['montant'];
        $this->taxe = $this->taxe - $taxe;
        $this->total = $this->total -  $this->rowCompte[$rowId]['total'];
        $this->totalHaut = getCurrency()->sigle." ".$this->total;
        unset($this->rowCompte[$rowId]);
        array_values($this->rowCompte);
    }

    public function addArticleRow()
    {
        $this->rowArticle[] = [
            'article_id' => '',
            'montant' => 0,
            'description' => '',
            'qte' => 1,
            'taxe_id' => '',
            'total' => 0,
        ];
    }

    public function deleteArticleRow($rowId)
    {
        $taxe = $this->rowArticle[$rowId]['total'] - $this->rowArticle[$rowId]['montant'];
        $this->total_sans_taxe = $this->total_sans_taxe - $this->rowArticle[$rowId]['montant'];
        $this->taxe = $this->taxe - $taxe;
        $this->total = $this->total -  $this->rowArticle[$rowId]['total'];
        $this->totalHaut = getCurrency()->sigle." ".$this->total;
        unset($this->rowArticle[$rowId]);
        array_values($this->rowArticle);
    }

    public function closePopup()
    {
        $this->emit('renderDepenseRefresh');
    }

    public function confirmDeleteCompte($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-compte-depense-simple',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer ce plan comptable ?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function confirmDeleteArticle($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-article-depense-simple',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer cet article ?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function deleteCompteDepense($articleId)
    {
        (new DepensesPanierController)->destroy($articleId);
        $this->emit('getDepenseData', $this->IdDepense);
    }

    public function confirmDeleteFacture()
    {

        $this->dispatchBrowserEvent('swal:confirm-delete-depense-simple',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer cette dépense ?',
            'text' => '',
            'id' => $this->IdDepense,
            'typeFacture' => 'depense'
        ]);
    }

    public function mount()
    {
        $this->articles = getDataBySession()['Articles'];
    }

    public function updated()
    {
        $mHT = $this->DepenseData->total_sans_taxe ?? 0;
        $mTTC = $this->DepenseData->total ?? 0;
        $mTaxe = $this->DepenseData->taxe ?? 0;

        foreach ($this->rowCompte as $key => $artTab) {
            $qte = $this->rowCompte[$key]['qte'];
            $this->rowCompte[$key]['total'] = floatval($this->rowCompte[$key]['montant']) * $qte;
            $mHT += $this->rowCompte[$key]['total'];

            foreach ($this->taxes as $taxe) {
                if ($taxe->id == $this->rowCompte[$key]['taxe_id']) {
                    $taxe_value = (floatval($this->rowCompte[$key]['montant']) * $taxe->taux) / 100;
                    $this->rowCompte[$key]['total'] = floatval($this->rowCompte[$key]['montant']) + $taxe_value;
                    $mTaxe += $taxe_value;
                }
            }

            $mTTC += $this->rowCompte[$key]['total'];
        }

        foreach ($this->rowArticle as $key => $artTab) {
            $qte = $this->rowArticle[$key]['qte'];
            foreach ($this->articles as $article) {
                if ($article->id == $this->rowArticle[$key]['article_id']) {
                    $this->rowArticle[$key]['montant'] = floatval($article->prix_unitaire * $qte);
                    $this->rowArticle[$key]['total'] = floatval($this->rowArticle[$key]['montant']);
                    $mHT += $this->rowArticle[$key]['total'];
                }
            }

            foreach ($this->taxes as $taxe) {
                if ($taxe->id == $this->rowArticle[$key]['taxe_id']) {
                    $taxe_value = ($this->rowArticle[$key]['montant'] * $taxe->taux) / 100;
                    $this->rowArticle[$key]['total'] = $this->rowArticle[$key]['montant'] + $taxe_value;
                    $mTaxe += $taxe_value;
                }
            }

            $mTTC += $this->rowArticle[$key]['total'];
        }

        $this->total_sans_taxe = $mHT;
        $this->taxe = $mTaxe;
        $this->total = $mTTC;
        $this->totalHaut = getCurrency()->sigle." ".$mTTC;
    }

    private function resetInputFields()
    {
        $this->fournisseur = "";
        $this->date_paiement = "";
        $this->reference = "";
        $this->note = "";
        $this->fichier = "";
        $this->paiements_modalite_id = "";
        $this->type = "";
        $this->taxe = "";
        $this->total_sans_taxe = "";
        $this->total = "";
        $this->totalHaut = "";
        $this->IdDepense = "";
        $this->echeance = "";
        $this->paiementsource_id = "";
        $this->paiements_mode_id = "";
        $this->DepenseData = "";
        $this->pieceJointe = "";
        $this->rowCompte = [];
        $this->rowArticle = [];
    }


    public function update(Request $request)
    {
        $validated = $this->validate();

        if($this->fichier){
            $savePiece = new DepenseController;
            $savePiece->pieceJointeUpdate($this->fichier, $this->idFacture, $this->entrepriseId);
        }

        $validated = $request->all()['serverMemo']['data'];

        $articlesData = new DepenseController;
        $articlesData->depenseFactureUpdate($validated);

        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Depense Modifié avec succès!',
            'text' => ''
        ]);
        $this->resetInputFields();
        $this->emit('renderDepenseRefresh');
    }


    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.depense-simple.update', compact('data'));
    }
}
