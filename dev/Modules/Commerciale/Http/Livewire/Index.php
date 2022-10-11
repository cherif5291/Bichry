<?php

namespace Modules\Commerciale\Http\Livewire;

use App\Http\Controllers\FactureController;
use App\Models\Control;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Commerciale\Http\Controllers\CommercialeController;

class Index extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $action;
    public $selectedItem;
    public $nom, $stock = 1, $categories_article_id, $comptes_comptable_id, $taxe_id, $image, $prix_unitaire =0, $description;
    public $entreprise, $prenom, $titre, $telephone, $email, $type;
    public $paiements_modalite_id, $adresse, $ville, $pays, $devises_monetaire_id, $paiements_mode_id;
    public $showModalArticle = false;
    public $showModalClient = false;
    public $Factures, $Session;


    protected $listeners = [
        'openCatModal' => 'openModal',
        'deleteFacture',
        'renderRefresh' => 'mount',
    ];

    public function updated($propertyName)
    {
        // FACTURE

        if ($this->action == 'facture_article_add') {
            $this->dispatchBrowserEvent('openFactureAddModal');
        }
        elseif($this->action == 'facture_fournisseur_add') {
            $this->dispatchBrowserEvent('openFactureAddModal');
        }

        elseif ($this->action == 'facture_article_update') {
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        }
        elseif($this->action == 'facture_fournisseur_update') {
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        }

        // RECU

        elseif($this->action == 'recu_article_add') {
            $this->dispatchBrowserEvent('openRecuAddModal');
        }
        elseif($this->action == 'recu_fournisseur_add') {
            $this->dispatchBrowserEvent('openRecuAddModal');
        }

        elseif($this->action == 'recu_article_update') {
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }
        elseif($this->action == 'recu_fournisseur_update') {
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }
        //$this->validateOnly($propertyName);
    }

    public function openModal($nom)
    {
        // FACTURE
        if ($nom == 'article') {
            $this->showModalArticle = true;
            $this->action = "facture_article_update";
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        } elseif ($nom == 'fournisseur') {
            $this->showModalClient = true;
            $this->action = "facture_fournisseur_update";
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        }
        elseif ($nom == 'articleAdd') {
            $this->showModalArticle = true;
            $this->action = "facture_article_add";
            $this->dispatchBrowserEvent('openFactureAddModal');
        }elseif ($nom == 'fournisseurAdd') {
            $this->showModalClient = true;
            $this->action = "facture_fournisseur_add";
            $this->dispatchBrowserEvent('openFactureAddModal');
        }
        /// RECU
        elseif ($nom == 'articleRecuAdd') {
            $this->showModalArticle = true;
            $this->action = "recu_article_add";
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($nom == 'fournisseurRecuAdd') {
            $this->showModalClient = true;
            $this->action = "recu_fournisseur_add";
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($nom == 'articleRecuUpdate') {
            $this->showModalArticle = true;
            $this->action = "recu_article_update";
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }elseif ($nom == 'fournisseurRecuUpdate') {
            $this->showModalClient = true;
            $this->action = "recu_fournisseur_update";
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }
    }


    public function closeModal($nom)
    {
        if ($this->selectedItem == '0' && $this->action == 'facture_article_add') {
            $this->showModalArticle = false;
            $this->dispatchBrowserEvent('openFactureAddModal');
        }elseif ($this->selectedItem == '0' && $this->action == 'facture_fournisseur_add') {
            $this->showModalClient = false;
            $this->dispatchBrowserEvent('openFactureAddModal');
        }elseif ($this->action == 'facture_article_update') {
            $this->showModalArticle = false;
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        } elseif ($this->action == 'facture_fournisseur_update') {
            $this->showModalClient = false;
            $this->dispatchBrowserEvent('openFactureUpdateModal');
        }elseif ($this->action == 'recu_article_add') {
            $this->showModalArticle = false;
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($this->action == 'recu_fournisseur_add') {
            $this->showModalClient = false;
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($this->action == 'recu_article_update') {
            $this->showModalArticle = false;
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }elseif ($this->action == 'recu_fournisseur_update') {
            $this->showModalClient = false;
            $this->dispatchBrowserEvent('openRecuUpdateModal');
        }
    }

    private function resetInputFields()
    {
        $this->nom = "";
        $this->stock = "";
        $this->type = "";
        $this->comptes_comptable_id = "";
        $this->taxe_id = "";
        $this->image = "";
        $this->prix_unitaire = "";
        $this->description = "";
    }

    private function resetInputClientFields()
    {
        $this->entreprise = "";
        $this->prenom = "";
        $this->nom = "";
        $this->telephone = "";
        $this->email = "";
        $this->titre = "";
        $this->adresse = "";
        $this->ville = "";
        $this->pays = "";
        $this->paiements_modalite_id = "";
        $this->logo = "";
        $this->devises_monetaire_id = "";
    }

    public function saveCategorie(Request $request)
    {
        $validateData = [
            'nom' => 'required',
            'type' => 'required',
        ];
        $this->validate($validateData);
        $articlesData = new CommercialeController;
        $articlesData->addNewArticle($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        if ($this->action == 'facture_article_update') {
            $this->emit('getPostId', $this->selectedItem, 'factureComPopup');
        }elseif ($this->action == 'facture_article_add') {
            $this->emit('refresh');
            $this->dispatchBrowserEvent('openFactureAddModal');
        }elseif ($this->action == 'recu_article_add') {
            $this->emit('refreshRecuData');
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($this->action == 'recu_article_update') {
            $this->emit('getRecuData', $this->selectedItem);
        }
        $this->closeModal('article');
    }

    public function saveArticleFacture(Request $request)
    {
        $validateData = [
            'entreprise' => 'required',
            'prenom' => 'nullable',
            'nom' => 'nullable',
            'telephone' => 'required',
            'email' => 'nullable',
            'adresse' => 'nullable',
            'ville' => 'nullable',
            'pays' => 'nullable',
            'devises_monetaire_id' => 'nullable',
            'paiements_modalite_id' => 'nullable',
            'paiements_mode_id' => 'nullable',
        ];
        $this->validate($validateData);
        $articlesData = new CommercialeController;
        $articlesData->addNewClient($request->all()['serverMemo']['data']);
        $this->resetInputClientFields();
        if ($this->action == 'facture_fournisseur_update') {
            $this->emit('getPostId', $this->selectedItem, 'factureComPopup');
        }elseif ($this->action == 'facture_fournisseur_add') {
            $this->emit('refresh');
            $this->dispatchBrowserEvent('openFactureAddModal');
        }elseif ($this->action == 'recu_fournisseur_add') {
            $this->emit('refreshRecuData');
            $this->dispatchBrowserEvent('openRecuAddModal');
        }elseif ($this->action == 'recu_fournisseur_update') {
            $this->emit('getRecuData', $this->selectedItem);
        }
        $this->closeModal('fournisseur');
    }

    public function selectItem($itemId, $action)
    {
        $this->selectedItem = $itemId;
        //dd('ok');
        if ($action == 'factureComPopup') {
            // This will show the modal facture form on the frontend
            $this->dispatchBrowserEvent('openFactureUpdateModal');

            // This Call the method getPostId from Facture controller
            $this->emit('getPostId', $this->selectedItem, $action);
        } elseif ($action == 'recuPopup') {
            // This will show the modal facture form on the frontend
            $this->dispatchBrowserEvent('openRecuUpdateModal');

            // This Call the method getPostId from Facture controller
            $this->emit('getRecuData', $this->selectedItem, $action);
        } elseif ($action == 'addFacture') {
            // This will show the modal facture form on the frontend
            $this->dispatchBrowserEvent('openFactureAddModal');
        } elseif ($action == 'addRecu') {
            // This will show the modal facture form on the frontend
            $this->dispatchBrowserEvent('openRecuAddModal');
        }
    }


    public function deleteFacture($factureId, $type)
    {
       (new FactureController)->destroy($factureId);

        if ($type == 'facture') {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'success',
                'title' => 'Facture supprimer avec succès!',
                'text' => ''
            ]);
        }elseif ($type == 'recu') {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'success',
                'title' => 'Reçu supprimer avec succès!',
                'text' => ''
            ]);
        }
        $this->emit('renderRefresh');
    }

    public function mount()
    {
        $this->Factures = getDataBySession()['Factures'];
        $this->Session = getUserSession();
    }
    public function render()
    {
        $Factures = $this->Factures;
        $Session = $this->Session;
        $PageName = "Liste des factures";
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

        return view('commerciale::livewire.index', compact('PageName', 'Session', 'Factures'));
    }
}
