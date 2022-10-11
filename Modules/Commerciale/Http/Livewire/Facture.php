<?php

namespace Modules\Commerciale\Http\Livewire;

use App\Http\Controllers\DepensesPanierController;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Commerciale\Http\Controllers\CommercialeController;
use Modules\Commerciale\Http\Requests\UpdateFactureRequest;

class Facture extends Component
{
    use WithFileUploads;

    public $fournisseur,$cc_cci, $paiements_modalite_id, $date_facturation, $echeance, $type, $numero_facture;
    public $taxe, $total_sans_taxe, $total,$totalHaut, $message, $message_affiche, $article_id, $description, $qte, $taxe_id;
    public $has_taxe, $fichier, $numero_cheque, $adresse_postale, $adresse_facturation, $reference, $paiements_source_id;
    public $pieceJointe, $modelId, $paiements_mode_id, $numero_recu, $montant;
    public $additionalPhotos;
    public $updateMode = false;
    public $allArticleFetched = [];
    public $rowArticle = [];
    public $articles;
    public $taxes;
    public $idFacture, $entrepriseId;
    public $FactureData;

    protected $listeners = [
        'getPostId',
        'deleteArticleFacture',
        'refreshCategorie' => 'getPostId'
    ];

    public function rules()
    {
        return [
            'fournisseur' => 'nullable',
            'date_facturation' => 'nullable',
            'echeance' => 'nullable|date:Y-m-d',
            'has_taxe' => 'nullable',
            'numero_facture' => "nullable",
            'numero_cheque' => "nullable",
            'adresse_postale' => "nullable",

            'adresse_facturation' => "nullable|date:Y-m-d",
            'paiements_modalite_id' => "nullable",
            'message' => "nullable",
            'message_affiche' => "nullable",
            'cc_cci' => "nullable",

            'paiements_mode_id' => "nullable",
            'paiements_source_id' => "nullable",
            'reference' => "nullable",
            'numero_recu' => "nullable",

            'article_id' => "nullable",
            'description' => "nullable",
            'qte' => "nullable",
            'montant' => "nullable",
            'taxe_id' => "nullable",
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        $mHT = $this->FactureData->total_sans_taxe ?? 0;
        $mTTC = $this->FactureData->total ?? 0;
        $mTaxe = $this->FactureData->taxe ?? 0;

        foreach (getDataBySession()['Modalites'] as $key => $modalite) {
            if ($this->paiements_modalite_id == $modalite->id) {
                $duree = $modalite->duree;
                $date = Carbon::createFromFormat('Y-m-d', $this->date_facturation)->addDays($modalite->duree)->toDateString();
                $this->echeance = $date;
            }
        }

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
    }

    public function getPostId($modelId, $action)
    {
        $this->modelId = $modelId;
        $this->articles = getDataBySession()['Articles'];
        $this->taxes = getDataBySession()['Taxes'];



        if ($action == 'factureComPopup') {
            $Facture = getFactureById($modelId);
            $this->FactureData = $Facture;
        }elseif ($action == 'recuPopup') {
            $Facture = getFactureById($modelId);
            $this->FactureData = $Facture;
        }
        //dd($Facture);
        $this->fournisseur = "C".$Facture->clients_entreprise_id;
        $this->cc_cci = $Facture->cc_cci;
        $this->paiements_modalite_id = $Facture->paiements_modalite_id;
        $this->date_facturation = $Facture->date_facturation;
        $this->echeance = $Facture->echeance;
        $this->numero_facture = $Facture->numero_facture;
        $this->message = $Facture->message;
        $this->message_affiche = $Facture->message_affiche;
        $this->has_taxe = $Facture->has_taxe;
        $this->fichier = $Facture->fichier;
        $this->type = $Facture->type;
        $this->allArticleFetched = $Facture->depensesPaniers;
        $this->pieceJointe = $Facture->piecesJointes[0]->fichier ?? "";
        $this->updateMode = true;
        $this->idFacture = $Facture->id;
        $this->entrepriseId = $Facture->entreprise_id;
        $this->taxe = $Facture->taxe;
        $this->total_sans_taxe = $Facture->total_sans_taxe;
        $this->total = $Facture->total;
        $this->totalHaut = getCurrency()->sigle." ".$Facture->total;
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
    public function confirmDeleteArticle($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-article-facture',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer cette article ?',
            'text' => '',
            'id' => $id
        ]);
    }
    public function deleteArticleFacture($articleId)
    {
        (new DepensesPanierController)->destroy($articleId);
        $this->emit('getPostId', $this->idFacture, 'factureComPopup');
    }

    public function closePopup()
    {
        $this->emit('renderRefresh');
    }

    public function confirmDeleteFacture($id)
    {
        $this->dispatchBrowserEvent('swal:confirm-delete-facture',[
            'type' => 'warning',
            'title' => 'Voulez-vous vraiment supprimer cette facture ?',
            'text' => '',
            'id' => $id,
            'typeFacture' => 'facture'
        ]);
    }



    public function update(UpdateFactureRequest $request)
    {
        if($this->fichier){
            $savePiece = new CommercialeController;
            $savePiece->pieceJointeUpdate($this->fichier, $this->idFacture, $this->entrepriseId);
        }

        $validated = $request->all()['serverMemo']['data'];
        $articlesData = new CommercialeController;
        $articlesData->depenseFactureUpdate($validated);
        $this->rowArticle = [];
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Facture Modifié avec succès!',
            'text' => ''
        ]);
        $this->emit('renderRefresh');
    }

    public function openModal($nom)
    {
        if ($nom == 'article') {
            $this->emit('openCatModal', 'article');
        }elseif ($nom == 'fournisseur') {
            $this->emit('openCatModal', 'fournisseur');
        }
    }



    public function render()
    {
        $data = getDataBySession();
        return view('commerciale::livewire.facture', compact('data'));
    }
}
