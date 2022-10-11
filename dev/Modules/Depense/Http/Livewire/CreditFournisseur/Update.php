<?php

namespace Modules\Depense\Http\Livewire\CreditFournisseur;

use App\Http\Controllers\DepensesPanierController;
use Illuminate\Http\Request;
use Livewire\Component;
use Modules\Depense\Http\Controllers\DepenseController;

class Update extends Component
{
    public $fournisseur, $date_paiement, $reference, $note, $fichier;
    public $taxe, $total_sans_taxe, $total, $totalHaut, $IdDepense;
    public $DepenseData, $taxes, $pieceJointe;
    public $allArticleFetched = [];
    public $rowCompte = [];

    protected $listeners = [
        'getCreditData',
        'deleteCompteCredit'
    ];

    public function getCreditData($id, $action = null)
    {
        $Depense = getDepenseById($id);
        $this->DepenseData = $Depense;
        $this->taxes = getDepenseDataBySession()['Taxes'];

        if ($Depense->creditFournisseurs->clients_entreprise_id > 0) {
            $this->fournisseur = "C".$Depense->creditFournisseurs->clients_entreprise_id ?? '';
        }elseif ($Depense->creditFournisseurs->fournisseur_id > 0) {
            $this->fournisseur = "F".$Depense->creditFournisseurs->fournisseur_id ?? '';
        }

        $this->IdDepense = $Depense->id;
        $this->date_paiement = $Depense->creditFournisseurs->date_paiement;
        $this->reference = $Depense->creditFournisseurs->reference;
        $this->note = $Depense->creditFournisseurs->note;
        $this->pieceJointe = $Depense->piecesJointes[0]->fichier ?? "";
        $this->taxe = $Depense->taxe;
        $this->total_sans_taxe = $Depense->total_sans_taxe;
        $this->total = $Depense->total;
        $this->totalHaut = getCurrency()->sigle." ".$Depense->total;
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
            $this->emit('openExpressWithUpdate', $this->IdDepense, 'credit', 'compte', 'update');
        }elseif ($nom == 'client') {
            $this->emit('openExpressWithUpdate', $this->IdDepense, 'credit', 'client', 'update');
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

    public function closePopup()
    {
        $this->emit('renderDepenseRefresh');
    }

    public function confirmDeleteCompte($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-article-credit',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer ce compte comptable ?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function deleteCompteCredit($articleId)
    {
        (new DepensesPanierController)->destroy($articleId);
        $this->emit('getCreditData', $this->IdDepense);
    }

    public function confirmDeleteFacture()
    {

        $this->dispatchBrowserEvent('swal:confirm-delete-credit',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer ce credit fournisseur ?',
            'text' => '',
            'id' => $this->IdDepense,
            'typeFacture' => 'credit'
        ]);
    }


    public function updated($propertyName)
    {
        $mHT = $this->DepenseData->total_sans_taxe ?? 0;
        $mTTC = $this->DepenseData->total ?? 0;
        $mTaxe = $this->DepenseData->taxe ?? 0;

        foreach ($this->rowCompte as $key => $artTab) {
            $qte = $this->rowCompte[$key]['qte'];
            //$this->rowCompte[$key]['montant'] = $article->prix_unitaire * $qte;
            $this->rowCompte[$key]['total'] = floatval($this->rowCompte[$key]['montant']) * $qte;
            $mHT += $this->rowCompte[$key]['total'];

            foreach ($this->taxes as $taxe) {
                if ($taxe->id == $this->rowCompte[$key]['taxe_id']) {
                    $taxe_value = ($this->rowCompte[$key]['montant'] * $taxe->taux) / 100;
                    $this->rowCompte[$key]['total'] = $this->rowCompte[$key]['montant'] + $taxe_value;
                    $mTaxe += $taxe_value;
                }
            }

            $mTTC += $this->rowCompte[$key]['total'];
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
            'title' => 'Credit fournisseur Modifié avec succès!',
            'text' => ''
        ]);
        $this->resetInputFields();
        $this->emit('renderDepenseRefresh');
    }

    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.credit-fournisseur.update', compact('data'));
    }
}
