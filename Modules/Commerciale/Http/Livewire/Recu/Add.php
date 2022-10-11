<?php

namespace Modules\Commerciale\Http\Livewire\Recu;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Commerciale\Http\Controllers\CommercialeController;

class Add extends Component
{
    use WithFileUploads;

    public $fournisseur,$cc_cci, $date_recu, $type;
    public $taxe, $total_sans_taxe, $total,$totalHaut, $message, $message_affiche, $description, $qte, $taxe_id;
    public $fichier, $numero_cheque, $adresse_postale, $adresse_facturation, $reference, $paiements_source_id;
    public $pieceJointe, $paiements_mode_id, $numero_recu, $montant;
    public $updateMode = false;
    public $allArticleFetched = [];
    public $rowArticle = [];
    public $articles;
    public $taxes;
    public $idFacture, $FactureData;

    protected $listeners = [
        'refreshRecuData' => 'mount'
    ];

    public function rules()
    {
        return [
            'fournisseur' => 'required',
            'date_recu' => 'nullable|date:Y-m-d',
            'adresse_postale' => "nullable",

            'adresse_facturation' => "nullable|date:Y-m-d",
            'message' => "nullable",
            'message_affiche' => "nullable",
            'cc_cci' => "nullable",

            'paiements_mode_id' => "nullable",
            'paiements_source_id' => "nullable",
            'reference' => "nullable",
            'numero_recu' => "nullable",
        ];
    }

    public function updated($propertyName)
    {

        $mHT = $this->FactureData->total_sans_taxe ?? 0;
        $mTTC = $this->FactureData->total ?? 0;
        $mTaxe = $this->FactureData->taxe ?? 0;

        foreach ($this->rowArticle as $key => $artTab) {
            $qte = $this->rowArticle[$key]['qte'];
            foreach ($this->articles as $article) {
                if ($article->id == $this->rowArticle[$key]['article_id']) {
                    $this->rowArticle[$key]['montant'] = $article->prix_unitaire * $qte;
                    $this->rowArticle[$key]['total'] = $this->rowArticle[$key]['montant'];
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

    public function mount()
    {
        $this->articles = getDataBySession()['Articles'];
        $this->taxes = getDataBySession()['Taxes'];
        $this->date_recu = Carbon::now()->format('Y-m-d');
    }

    public function addRow()
    {
        $this->rowArticle[] = [
            'article_id' => '',
            'montant' => 0,
            'description' => '-',
            'qte' => 1,
            'taxe_id' => '',
            'total' => 0,
        ];
    }

    public function deleteRow($rowId)
    {
        $taxe = $this->rowArticle[$rowId]['total'] - $this->rowArticle[$rowId]['montant'];
        $this->total_sans_taxe = $this->total_sans_taxe - $this->rowArticle[$rowId]['montant'];
        $this->taxe = $this->taxe - $taxe;
        $this->total = $this->total -  $this->rowArticle[$rowId]['total'];
        $this->totalHaut = getCurrency()->sigle." ".$this->total;
        unset($this->rowArticle[$rowId]);
        array_values($this->rowArticle);
    }

    public function openModal($nom)
    {
        if ($nom == 'article') {
            $this->emit('openCatModal', 'articleRecuAdd');
        }elseif ($nom == 'fournisseur') {
            $this->emit('openCatModal', 'fournisseurRecuAdd');
        }

        //$this->dispatchBrowserEvent('openFactureUpdateModal');
    }


    public function closeModal($nom)
    {
        if ($nom == 'article') {
            $this->showModalArticle = false;
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($nom == 'fournisseur') {
            $this->showModalClient = false;
            $this->dispatchBrowserEvent('openRecuAddModal');
        }
    }

    private function resetInputFields()
    {
        $this->fournisseur = "";
        $this->cc_cci = "";
        $this->paiements_modalite_id = "";
        $this->date_facturation = "";
        $this->echeance = "";
        $this->type = "";
        $this->numero_facture = "";
        $this->taxe = "";
        $this->total_sans_taxe = "";
        $this->total = "";
        $this->totalHaut = "";
        $this->message = "";
        $this->message_affiche = "";
        $this->article_id = "";
        $this->description = "";
        $this->qte = "";
        $this->taxe_id = "";
        $this->has_taxe = "";
        $this->adresse_postale = "";
        $this->adresse_facturation = "";
        $this->reference = "";
        $this->paiements_source_id = "";
        $this->montant = "";
    }


    public function save(Request $request)
    {
        $validated = $this->validate();
        $validated = $request->all()['serverMemo']['data'];
        $validated['type'] = "recu";
        $articlesData = new CommercialeController;
        $articlesData->depenseFactureAdd($validated);
        $this->rowArticle = [];
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Reçu Ajouté avec succès!',
            'text' => ''
        ]);
        //$this->emit('refresh');
        $this->resetInputFields();
        $this->emit('renderRefresh');
    }

    public function render()
    {
        $data = getDataBySession();
        return view('commerciale::livewire.recu.add', compact('data'));
    }
}
