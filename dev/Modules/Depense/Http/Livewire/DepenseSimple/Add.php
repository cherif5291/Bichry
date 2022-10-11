<?php

namespace Modules\Depense\Http\Livewire\DepenseSimple;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Depense\Http\Controllers\DepenseController;

class Add extends Component
{
  use WithFileUploads;

    public $fournisseur, $date_paiement, $reference, $note, $fichier, $paiements_modalite_id, $type;
    public $taxe, $total_sans_taxe, $total, $totalHaut, $IdDepense, $echeance, $paiementsource_id, $paiements_mode_id;
    public $DepenseData, $taxes, $pieceJointe;
    public $allCompteFetched = [], $allArticleFetched = [];
    public $rowCompte = [], $rowArticle = [];
    public $rowCompte_bool=0;


    protected $listeners = [
        'refreshDepenseAddData' => 'mount'
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
            $this->emit('openExpressWithUpdate', 0, 'depense', 'compte', 'add');
        }elseif ($nom == 'client') {
            $this->emit('openExpressWithUpdate', 0, 'depense', 'client', 'add');
        }elseif ($nom == 'article') {
            $this->emit('openExpressWithUpdate', 0, 'depense', 'article', 'add');
        }
        elseif  ($nom == 'paiement') {
            $this->emit('openExpressWithUpdate', 0, 'paiement','paiement','add');
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

    public function mount(){
        $this->taxes = getDepenseDataBySession()['Taxes'];
        $this->articles = getDataBySession()['Articles'];
        getDepenseDataBySession();
        $this->date_paiement = Carbon::now()->format('Y-m-d');
        if ($this->rowCompte_bool==0) {
          $this->addRow();
          $this->rowCompte_bool =1;
        }
        $this->type = "depense";
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

        $this->total_sans_taxe = formatpriceth($mHT,getCurrency());
        $this->taxe = formatpriceth($mTaxe,getCurrency());
        $this->total = formatpriceth($mTTC,getCurrency());
        $this->totalHaut = formatpriceth($mTTC,getCurrency());
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
            'title' => 'Dépense ajoutée avec succès!',
            'text' => ''
        ]);
        if ($this->fichier !="") {
          $this->fichier->store('fichierUpload');
        }
        $this->resetInputFields();
        $this->emit('renderDepenseRefresh');
    }

    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.depense-simple.add', compact('data'));
    }
}
