<?php

namespace Modules\Commerciale\Http\Livewire\Recu;

use App\Http\Controllers\DepensesPanierController;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Commerciale\Http\Controllers\CommercialeController;
use Modules\Commerciale\Http\Requests\UpdateFactureRequest;

class Update extends Component
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
    public $idFacture;
    public $FactureData;

    protected $listeners = [
        'getRecuData',
        'deleteArticleRecu'
    ];

    public function rules()
    {
        return [
            'fournisseur' => 'nullable',
            'echeance' => 'nullable|date:Y-m-d',
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

    public function mount()
    {
        $this->articles = getDataBySession()['Articles'];
    }

    public function getRecuData($id, $action = null)
    {
        //sdd($id);
        $this->modelId = $id;
        $this->articles = getDataBySession()['Articles'];
        $this->taxes = getDataBySession()['Taxes'];
        $Facture = getFactureById($id);
        //dd($Facture);
        $this->FactureData = $Facture;
        $this->fournisseur = "C".$Facture->clients_entreprise_id;
        $this->cc_cci = $Facture->cc_cci;
        $this->date_recu = $Facture->date_recu;
        $this->numero_recu = $Facture->numero_recu;
        $this->message = $Facture->message;
        $this->paiements_mode_id = $Facture->paiements_mode_id;
        $this->reference = $Facture->reference;
        $this->message_affiche = $Facture->message_affiche;
        $this->type = $Facture->type;
        $this->allArticleFetched = $Facture->depensesPaniers;
        $this->pieceJointe = $Facture->piecesJointes[0]->fichier ?? "";
        $this->idFacture = $Facture->id;
        $this->taxe = $Facture->taxe;
        $this->total_sans_taxe = $Facture->total_sans_taxe;
        $this->total = $Facture->total;
        $this->totalHaut = getCurrency()->sigle." ".$Facture->total;
        //$this->updateMode = true;
    }

    public function openModal($nom)
    {
        if ($nom == 'article') {
            $this->emit('openCatModal', 'articleRecuUpdate');
        }elseif ($nom == 'fournisseur') {
            $this->emit('openCatModal', 'fournisseurRecuUpdate');
        }
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

    public function confirmDeleteArticle($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-article',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer cette article ?',
            'text' => '',
            'id' => $id
        ]);
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

    public function closePopup()
    {
        $this->emit('renderRefresh');
    }
    public function deleteArticleRecu($articleId)
    {
        (new DepensesPanierController)->destroy($articleId);
        $this->emit('getRecuData', $this->idFacture);
    }

    public function confirmDeleteFacture($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-recu',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer ce reçu ?',
            'text' => '',
            'id' => $id,
            'typeFacture' => 'recu'
        ]);
    }


    public function updated($propertyName)
    {
        //$this->validateOnly($propertyName);

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

    public function update(UpdateFactureRequest $request)
    {
        if($this->fichier){
            $savePiece = new CommercialeController;
            $savePiece->pieceJointeUpdate($this->fichier, $this->idFacture, $this->entrepriseId);
        }

        $validated = $request->all()['serverMemo']['data'];
        //dd($validated);
        $articlesData = new CommercialeController;
        $articlesData->depenseFactureUpdate($validated);
        $this->rowArticle = [];
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Reçu Modifié avec succès!',
            'text' => ''
        ]);
        $this->emit('renderRefresh');
    }


    public function render()
    {
        $data = getDataBySession();
        return view('commerciale::livewire.recu.update', compact('data'));
    }
}
