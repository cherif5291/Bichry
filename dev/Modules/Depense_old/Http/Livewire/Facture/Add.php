<?php

namespace Modules\Depense\Http\Livewire\Facture;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Depense\Http\Controllers\DepenseController;


class Add extends Component
{
  use WithFileUploads;

  public $fournisseur, $date_facturation, $numero_facture, $note, $fichier, $paiements_modalite_id;
  public $taxe, $total_sans_taxe, $total, $totalHaut, $IdDepense, $echeance, $type;
  public $DepenseData, $taxes, $pieceJointe;
  public $allCompteFetched = [];
  public $rowCompte = [];
  public $rowCompte_bool=0;

    protected $listeners = [
        'refreshFactureAddData' => 'mount'
    ];

    public function rules()
    {
        return [
            'fournisseur' => 'required',
            'date_facturation' => 'nullable|date:Y-m-d',
            'numero_facture' => "nullable",
            'note' => "nullable",
            'taxe' => "nullable",
            'total_sans_taxe' => "nullable",
            'total' => "nullable",
        ];
    }

    public function openModalExpress($nom)
    {
        if ($nom == 'compte') {
            $this->emit('openExpressWithUpdate', 0, 'facture', 'compte', 'add');
        }elseif ($nom == 'client') {
            $this->emit('openExpressWithUpdate', 0, 'facture', 'client', 'add');
        }elseif ($nom == 'article') {
            $this->emit('openExpressWithUpdate', 0, 'facture', 'article', 'add');
        }
    }

    public function addRow()
    {
      $this->rowCompte[] = [
          'article_id' => '',
          'compte_comptable_id' => '',
          'montant' => 0,
          'description' => '-',
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
        $this->date_facturation = Carbon::now()->format('Y-m-d');
        $this->type = "facture";
        if ($this->rowCompte_bool==0) {
          $this->addRow();
          $this->rowCompte_bool =1;
        }
    }

    private function resetInputFields()
    {
      $this->fournisseur = "";
      $this->date_paiement = "";
      $this->numero_facture = "";
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
      $this->rowCompte_bool =0;
    }

    public function save(Request $request)
    {
      $validated = $this->validate();
      $validated = $request->all()['serverMemo']['data'];
      $articlesData = new DepenseController;
      $articlesData->depenseFactureSave($validated);
      $this->dispatchBrowserEvent('swal:modal',[
          'type' => 'success',
          'title' => 'Facture Ajoutée avec succès!',
          'text' => ''
      ]);
      // ajout fichier dans le dossier fichierUpload
      // $this->fichier->store('fichierUpload');
      $this->resetInputFields();
      $this->emit('renderDepenseRefresh');
    }

    public function updated()
    {
        if ($this->rowCompte_bool==0) {
          $this->addRow();
          $this->rowCompte_bool =1;
        }

        $mHT = $this->DepenseData->total_sans_taxe ?? 0;
        $mTTC = $this->DepenseData->total ?? 0;
        $mTaxe = $this->DepenseData->taxe ?? 0;

        foreach (getDataBySession()['Modalites'] as $key => $modalite) {
            if ($this->paiements_modalite_id == $modalite->id) {
                $duree = $modalite->duree;
                if ($modalite->duree == NULL) {
                  $modalite->duree=0;
                }
                $date = Carbon::createFromFormat('Y-m-d', $this->date_facturation)->addDays($modalite->duree)->toDateString();
                $this->echeance = $date;
            }
        }

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
        $this->total_sans_taxe = formatpriceth($mHT,getCurrency());
        $this->taxe = formatpriceth($mTaxe,getCurrency());
        $this->total = formatpriceth($mTTC,getCurrency());
        // $this->totalHaut = getCurrency()->sigle." ".$mTTC;
        $this->totalHaut = formatpriceth($mTTC, getCurrency());
    }

    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.facture.add', compact('data'));
    }
}
