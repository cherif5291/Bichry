<?php

namespace Modules\Depense\Http\Livewire\CreditFournisseur;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Modules\Depense\Http\Controllers\DepenseController;

class Add extends Component
{
    public $fournisseur, $date_paiement, $reference, $note, $fichier;
    public $taxe, $total_sans_taxe, $total, $totalHaut, $type;
    public $taxes, $DepenseData;
    public $rowCompte = [];

    protected $listeners = [
        'refreshCreditAddData' => 'mount'
    ];

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
            $this->emit('openExpressWithUpdate', 0, 'credit', 'compte', 'add');
        }elseif ($nom == 'client') {
            $this->emit('openExpressWithUpdate', 0, 'credit', 'client', 'add');
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

    public function mount(){

        $this->taxes = getDepenseDataBySession()['Taxes'];
        getDepenseDataBySession();
        $this->date_paiement = Carbon::now()->format('Y-m-d');
        $this->type = "credit";
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

    public function save(Request $request)
    {
        $validated = $this->validate();

        $validated = $request->all()['serverMemo']['data'];
        $articlesData = new DepenseController;
        $articlesData->depenseFactureSave($validated);

        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Credit fournisseur Ajouté avec succès!',
            'text' => ''
        ]);
        $this->resetInputFields();
        $this->emit('renderDepenseRefresh');
    }

    public function updated($propertyName)
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



    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.credit-fournisseur.add', compact('data'));
    }
}
