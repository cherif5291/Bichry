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
  public $taxe, $total_sans_taxe, $total, $totalHaut, $IdDepense, $echeance, $type,$date_debut;
  public $DepenseData, $taxes, $pieceJointe;
  public $allCompteFetched = [];
  public $rowCompte = [];
  public $rowCompte_bool=0;
  public $stock_tmp=[];
  public $disable="",$line=[],$montantsup=0;
  public $mTTC,$mHT,$mTaxe;

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
          'qte' => '1',
          'taxe_id' => '',
          'total' => 0,
          
      ];
    }

    public function deleteRow($rowId)
    {
        $this->montantsup = $this->rowCompte[$rowId]['total'] - ($this->rowCompte[$rowId]['montant']*$this->rowCompte[$rowId]['qte']);
        $this->mHT = $this->mHT - ($this->rowCompte[$rowId]['montant']*$this->rowCompte[$rowId]['qte']);
        $this->mTTC = $this->mTTC - floatval($this->rowCompte[$rowId]['total']);
        $this->mTaxe = floatval($this->taxe) - $this->montantsup;
        $this->total_sans_taxe = formatpriceth($this->mHT,getCurrency());
         $this->taxe = formatpriceth($this->mTaxe,getCurrency());
        $this->total = formatpriceth($this->mTTC,getCurrency());
        // $this->totalHaut = getCurrency()->sigle." ".$mTTC;
        $this->totalHaut = formatpriceth($this->mTTC, getCurrency());
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
          'title' => 'Facture ajoutée avec succès!',
          'text' => ''
      ]);
      // ajout fichier dans le dossier fichierUpload
      // if ($this->fichier!="") {
      //   $this->fichier->store('fichierUpload');
      // }
      $this->resetInputFields();
      // return redirect('https://bilan-pro.com/depenses');
      $this->emit('renderDepenseRefresh');
    }

    public function updated()
    {
        if ($this->rowCompte_bool==0) {
          $this->addRow();
          $this->rowCompte_bool =1;
        }
        $this->mHT = $this->DepenseData->total_sans_taxe ?? 0;
        $this->mTTC = $this->DepenseData->total ?? 0;
        $this->mTaxe = $this->DepenseData->taxe ?? 0;

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
          // ici on recupere de helper la fonction qui fait requet à la base de donnée liste des articles by articles
          $getArticle=getArticlesbyID($this->rowCompte[$key]['article_id']);

          foreach ($getArticle['Article'] as $Art) {
              // $this->rowCompte[$key]['montant']=$Art->prix_unitaire;
              if ($Art->comptes_comptable_id >0) {
                $this->rowCompte[$key]['compte_comptable_id']=$Art->comptes_comptable_id;
                $this->disable = "disabled";
                $this->line[$key]=[$key=>'disabled'];
              }else {
                $this->line[$key]=[$key=>'actived'];
                $this->disable = "";
              }

              $this->stock_tmp[$key]=$Art->stock ?? 1 ;
              if ($this->rowCompte[$key]['qte']!='') {
                $qte = $this->rowCompte[$key]['qte'];
                $this->rowCompte[$key]['total'] = floatval($this->rowCompte[$key]['montant']) * $qte;
              }else {
                $qte = $this->stock_tmp[$key];
                $this->rowCompte[$key]['total'] = floatval($this->rowCompte[$key]['montant']) * $qte;
              }
            }

            $this->mHT += $this->rowCompte[$key]['total'];

            foreach ($this->taxes as $taxe) {
                if ($taxe->id == $this->rowCompte[$key]['taxe_id']) {
                    $taxe_value = ($this->rowCompte[$key]['total'] * $taxe->taux) / 100;
                    $this->rowCompte[$key]['total'] = $this->rowCompte[$key]['total'] + $taxe_value;
                    $this->mTaxe += $taxe_value;
                }
            }

            $this->mTTC += $this->rowCompte[$key]['total'];
        }
        $this->total_sans_taxe = formatpriceth($this->mHT,getCurrency());
        $this->taxe = formatpriceth($this->mTaxe,getCurrency());
        $this->total = formatpriceth($this->mTTC,getCurrency());
        // $this->totalHaut = getCurrency()->sigle." ".$mTTC;
        $this->totalHaut = formatpriceth($this->mTTC, getCurrency());
    }

    public function render()
    {
        $data = getDepenseDataBySession();
        return view('depense::livewire.facture.add', compact('data'));
    }
}
