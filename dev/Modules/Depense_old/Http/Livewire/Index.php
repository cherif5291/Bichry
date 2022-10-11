<?php

namespace Modules\Depense\Http\Livewire;

use App\Http\Controllers\DepenseController as ControllersDepenseController;
use App\Models\Control;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Depense\Http\Controllers\DepenseController;
use Illuminate\Support\Facades\Crypt;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $action, $selectedItem;
    public $nom, $stock = 1, $type, $comptes_comptable_id, $taxe_id, $prix_unitaire = 0, $description, $clientType="fournisseur", $numero_compte,$type_compte,$sous_type_compte;
    public $type_compteID,$sous_type_compteID,$DepenseFiltre;
    public $entreprise, $prenom, $telephone, $email, $titre, $adresse, $ville, $pays, $paiements_modalite_id, $devises_monetaire_id, $paiements_mode_id;
    public $showModalArticle = false;
    public $showModalClient = false;
    public $showModalCompte = false;

    protected $listeners = [
        'renderDepenseRefresh' => 'mount',
        'openExpressWithUpdate',
        'deleteFacture'
    ];

    public function openAddDepenseModal($action)
    {

        if ($action == 'facture') {
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($action == 'depense') {
            $this->dispatchBrowserEvent('openDepenseAddModal');
        } elseif ($action == 'cheque') {
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($action == 'credit') {
            $this->dispatchBrowserEvent('openCreditAddModal');
        }
    }

    public function openUpdateDepenseModal($itemId, $action)
    {
        $this->selectedItem = $itemId;

        if ($action == 'facture') {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
            $this->emit('getFactureData', $this->selectedItem, $action);
        } elseif ($action == 'depense') {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
            $this->emit('getDepenseData', $this->selectedItem, $action);
        } elseif ($action == 'cheque') {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
            $this->emit('getChequeData', $this->selectedItem, $action);
        } elseif ($action == 'credit') {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
            $this->emit('getCreditData', $this->selectedItem, $action);
        }
    }

    public function openArticleExpress($id, $type, $methode)
    {
        if ($type == "credit") {
            if ($methode == 'update') {
                $this->action = 'credit_article_update';
                $this->dispatchBrowserEvent('openCreditUpdateModal');
                $this->emit('getCreditData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'credit_article_add';
                $this->dispatchBrowserEvent('openCreditAddModal');
            }
        } elseif ($type == "facture") {
            if ($methode == 'update') {
                $this->action = 'facture_article_update';
                $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
                $this->emit('getFactureData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'facture_article_add';
                $this->dispatchBrowserEvent('openDepenseFactureAddModal');
            }
        } elseif ($type == "cheque") {
            if ($methode == 'update') {
                $this->action = 'cheque_article_update';
                $this->dispatchBrowserEvent('openChequeUpdateModal');
                $this->emit('getChequeData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'cheque_article_add';
                $this->dispatchBrowserEvent('openChequeAddModal');
            }
        } elseif ($type == "depense") {
            if ($methode == 'update') {
                $this->action = 'depense_article_update';
                $this->dispatchBrowserEvent('openDepenseUpdateModal');
                $this->emit('getDepenseData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'depense_article_add';
                $this->dispatchBrowserEvent('openDepenseAddModal');
            }
        }
    }

    public function openClientExpressWith($id, $type, $methode)
    {
        if ($type == "credit") {
            if ($methode == 'update') {
                $this->action = 'credit_client_update';
                $this->dispatchBrowserEvent('openCreditUpdateModal');
                $this->emit('getCreditData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'credit_client_add';
                $this->dispatchBrowserEvent('openCreditAddModal');
            }
        } elseif ($type == "facture") {
            if ($methode == 'update') {
                $this->action = 'facture_client_update';
                $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
                $this->emit('getFactureData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'facture_client_add';
                $this->dispatchBrowserEvent('openDepenseFactureAddModal');
            }
        } elseif ($type == "cheque") {
            if ($methode == 'update') {
                $this->action = 'cheque_client_update';
                $this->dispatchBrowserEvent('openChequeUpdateModal');
                $this->emit('getChequeData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'cheque_client_add';
                $this->dispatchBrowserEvent('openChequeAddModal');
            }
        } elseif ($type == "depense") {
            if ($methode == 'update') {
                $this->action = 'depense_client_update';
                $this->dispatchBrowserEvent('openDepenseUpdateModal');
                $this->emit('getDepenseData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'depense_client_add';
                $this->dispatchBrowserEvent('openDepenseAddModal');
            }
        }
    }

    public function openCompteExpress($id, $type, $methode)
    {
        if ($type == "credit") {
            if ($methode == 'update') {
                $this->action = 'credit_compte_update';
                $this->dispatchBrowserEvent('openCreditUpdateModal');
                $this->emit('getCreditData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'credit_compte_add';
                $this->dispatchBrowserEvent('openCreditAddModal');
            }
        } elseif ($type == "facture") {
            if ($methode == 'update') {
                $this->action = 'facture_compte_update';
                $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
                $this->emit('getFactureData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'facture_compte_add';
                $this->dispatchBrowserEvent('openDepenseFactureAddModal');
            }
        } elseif ($type == "cheque") {
            if ($methode == 'update') {
                $this->action = 'cheque_compte_update';
                $this->dispatchBrowserEvent('openChequeUpdateModal');
                $this->emit('getChequeData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'cheque_compte_add';
                $this->dispatchBrowserEvent('openChequeAddModal');
            }
        } elseif ($type == "depense") {
            if ($methode == 'update') {
                $this->action = 'depense_compte_update';
                $this->dispatchBrowserEvent('openDepenseUpdateModal');
                $this->emit('getDepenseData', $id);
            } elseif ($methode == 'add') {
                $this->action = 'depense_compte_add';
                $this->dispatchBrowserEvent('openDepenseAddModal');
            }
        }
    }

    public function openExpressWithUpdate($id, $type = null, $action, $methode)
    {
        if ($action == "article") {
            $this->showModalArticle = true;
            $this->openArticleExpress($id, $type, $methode);
        } elseif ($action == "client") {
            $this->showModalClient = true;
            $this->openClientExpressWith($id, $type, $methode);
        } elseif ($action == "compte") {
            $this->showModalCompte = true;
            $this->openCompteExpress($id, $type, $methode);
        }
    }

    public function closeExpressArticleModal()
    {
        // For Update
        if ($this->action == "credit_article_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
            $this->emit('getCreditData', $this->selectedItem);
        } elseif ($this->action == "facture_article_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
            $this->emit('getFactureData', $this->selectedItem);
        } elseif ($this->action == "cheque_article_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
            $this->emit('getChequeData', $this->selectedItem);
        } elseif ($this->action == "depense_article_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
            $this->emit('getDepenseData', $this->selectedItem);
        }

        // For Add
        if ($this->action == "credit_article_add") {
            $this->emit('refreshCreditAddData');
            $this->dispatchBrowserEvent('openCreditAddModal');
        } elseif ($this->action == "facture_article_add") {
            $this->emit('refreshFactureAddData');
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($this->action == "cheque_article_add") {
            $this->emit('refreshChequeAddData');
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($this->action == "depense_article_add") {
            $this->emit('refreshDepenseAddData');
            $this->dispatchBrowserEvent('openDepenseAddModal');
        }
    }

    public function closeExpressClientModal()
    {
        // For Update
        if ($this->action == "credit_client_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
            $this->emit('getCreditData', $this->selectedItem);
        } elseif ($this->action == "facture_client_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
            $this->emit('getFactureData', $this->selectedItem);
        } elseif ($this->action == "cheque_client_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
            $this->emit('getChequeData', $this->selectedItem);
        } elseif ($this->action == "depense_client_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
            $this->emit('getDepenseData', $this->selectedItem);
        }

        // For Add
        if ($this->action == "credit_client_add") {
            $this->emit('refreshCreditAddData');
            $this->dispatchBrowserEvent('openCreditAddModal');
        } elseif ($this->action == "facture_client_add") {
            $this->emit('refreshFactureAddData');
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($this->action == "cheque_client_add") {
            $this->emit('refreshChequeAddData');
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($this->action == "depense_client_add") {
            $this->emit('refreshDepenseAddData');
            $this->dispatchBrowserEvent('openDepenseAddModal');
        }
    }

    public function closeExpressCompteModal()
    {
        // For Update
        if ($this->action == "credit_compte_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
            $this->emit('getCreditData', $this->selectedItem);
        } elseif ($this->action == "facture_compte_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
            $this->emit('getFactureData', $this->selectedItem);
        } elseif ($this->action == "cheque_compte_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
            $this->emit('getChequeData', $this->selectedItem);
        } elseif ($this->action == "depense_compte_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
            $this->emit('getDepenseData', $this->selectedItem);
        }

        // For Add
        if ($this->action == "credit_compte_add") {
            $this->emit('refreshCreditAddData');
            $this->dispatchBrowserEvent('openCreditAddModal');
        } elseif ($this->action == "facture_compte_add") {
            $this->emit('refreshFactureAddData');
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($this->action == "cheque_compte_add") {
            $this->emit('refreshChequeAddData');
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($this->action == "depense_compte_add") {
            $this->emit('refreshDepenseAddData');
            $this->dispatchBrowserEvent('openDepenseAddModal');
        }
    }

    public function closeExpressModal($type)
    {
        if ($type == "article") {
            $this->closeExpressArticleModal();
            $this->showModalArticle = false;
        } elseif ($type == "client") {
            $this->closeExpressClientModal();
            $this->showModalClient = false;
        } elseif ($type == "compte") {
            $this->closeExpressCompteModal();
            $this->showModalCompte = false;
        }
    }

    private function resetInputFields()
    {
        $this->nom = "";
        $this->stock = "";
        $this->type = "";
        $this->numero_compte = "";
        $this->comptes_comptable_id = "";
        $this->taxe_id = "";
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
        $this->paiements_mode_id = "";
        $this->devises_monetaire_id = "";
    }

    public function saveArticle(Request $request)
    {
        $validateData = [
            'nom' => 'required',
            'type' => 'required',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewArticle($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        $this->closeExpressModal('article');
    }

    public function saveStock(Request $request)
    {
      $this->type="Stock";
        $validateData = [
            'nom' => 'required',
            'type' => 'required',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewArticle($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        $this->closeExpressModal('article');
    }

    public function saveProduit_HS(Request $request)
    {
        $validateData = [
            'nom' => 'required',
            'type' => 'required',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewArticle($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        $this->closeExpressModal('article');
    }

    public function saveService(Request $request)
    {
        $validateData = [
            'nom' => 'required',
            'type' => 'required',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewArticle($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        $this->closeExpressModal('article');
    }
        public function saveCompteComptable(Request $request)
    {
        $validateData = [
          'nom' => 'required',
          'numero_compte' => 'required',
          'type_compte' => 'nullable',
          'sous_type_compte' => 'nullable',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewCompteComptable($request->all()['serverMemo']['data']);
        $this->resetInputFields();
        $this->closeExpressModal('compte');
    }

    public function saveClient(Request $request)
    {
        $validateData = [
            'entreprise' => 'required',
            'prenom' => 'nullable',
            'nom' => 'nullable',
            'telephone' => 'nullable',
            'email' => 'nullable',
            'adresse' => 'nullable',
            'ville' => 'nullable',
            'pays' => 'nullable',
            'devises_monetaire_id' => 'nullable',
            'paiements_modalite_id' => 'nullable',
            'paiements_mode_id' => 'nullable',
        ];
        $this->validate($validateData);
        $articlesData = new DepenseController;
        $articlesData->addNewClient($request->all()['serverMemo']['data']);
        $this->resetInputClientFields();
        $this->closeExpressModal('client');
    }

    public function realTimeFetchFacture()
    {
        // Update Facture
        if ($this->action == "facture_client_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
        } elseif ($this->action == "facture_compte_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
        } elseif ($this->action == "facture_article_update") {
            $this->dispatchBrowserEvent('openDepenseFactureUpdateModal');
        }

        // Add Facture
        if ($this->action == "facture_client_add") {
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($this->action == "facture_compte_add") {
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        } elseif ($this->action == "facture_article_add") {
            $this->dispatchBrowserEvent('openDepenseFactureAddModal');
        }
    }

    public function realTimeFetchCredit()
    {
        // Update Crédit fournisseur
        if ($this->action == "credit_client_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
        } elseif ($this->action == "credit_compte_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
        } elseif ($this->action == "credit_article_update") {
            $this->dispatchBrowserEvent('openCreditUpdateModal');
        }
        // Add Crédit fournisseur
        elseif ($this->action == "credit_article_add") {
            $this->dispatchBrowserEvent('openCreditAddModal');
        } elseif ($this->action == "credit_client_add") {
            $this->dispatchBrowserEvent('openCreditAddModal');
        } elseif ($this->action == "credit_compte_add") {
            $this->dispatchBrowserEvent('openCreditAddModal');
        }
    }

    public function realTimeFetchCheque()
    {
        // Update Chèque
        if ($this->action == "cheque_client_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
        } elseif ($this->action == "cheque_compte_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
        } elseif ($this->action == "cheque_article_update") {
            $this->dispatchBrowserEvent('openChequeUpdateModal');
        }
        // Add Chèque
        elseif ($this->action == "cheque_client_add") {
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($this->action == "cheque_compte_add") {
            $this->dispatchBrowserEvent('openChequeAddModal');
        } elseif ($this->action == "cheque_article_add") {
            $this->dispatchBrowserEvent('openChequeAddModal');
        }
    }

    public function realTimeFetchDepense()
    {
        // Update Depense
        if ($this->action == "depense_client_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
        } elseif ($this->action == "depense_compte_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
        } elseif ($this->action == "depense_article_update") {
            $this->dispatchBrowserEvent('openDepenseUpdateModal');
        }
        // Add Depense
        elseif ($this->action == "depense_client_add") {
            $this->dispatchBrowserEvent('openDepenseAddModal');
        } elseif ($this->action == "depense_compte_add") {
            $this->dispatchBrowserEvent('openDepenseAddModal');
        } elseif ($this->action == "depense_article_add") {
            $this->dispatchBrowserEvent('openDepenseAddModal');
        }
    }

    public function deleteFacture($factureId, $type)
    {
        (new ControllersDepenseController)->destroy($factureId);

        if ($type == 'facture') {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Facture supprimer avec succès!',
                'text' => ''
            ]);
        } elseif ($type == 'credit') {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Crédit fournisseur supprimer avec succès!',
                'text' => ''
            ]);
        }
        $this->emit('renderDepenseRefresh');
    }

    public function type_compte()
    {
      $dataType_compte = ["Passif","Actif","Capitaux","Revenu","Coût des marchandises vendues","Dépense"];
        return $dataType_compte;
    }


    public function mount()
    {
      // chargement type de compte
        $this->type_compte = $this->type_compte();
        // chargement sous type de compte
        $this->Depense = getDepenseDataBySession()['Depenses'];
        if (isset($_GET['filtre'])) {
          $this->DepenseFiltre = getDepenseDataBySession()['DepensesFiltre'];
        }
        $this->Session = getUserSession();
        $this->realType_compteID();

    }

    public function realType_compteID()
    {
      if ($this->type_compteID !=''){

          if ($this->type_compteID=="Actif") {
            $this->sous_type_compte = ["Actif Court Terme","Matériel et immobilisations","Actif long Terme","Banque",'Carte de crédit'];
          }
          if ($this->type_compteID=="Passif") {
            $this->sous_type_compte = ["Passif Court","Passif long terme"];
          }
          if ($this->type_compteID=="Capitaux") {
            $this->sous_type_compte = ["Capital","Capital action","Bénéfice non-réparti"];
          }
          if ($this->type_compteID=="Revenu") {
            $this->sous_type_compte = ["Produit vendu","Service vendu"];
          }
          if ($this->type_compteID=="Coût des marchandises vendues") {
            $this->sous_type_compte = ["Stock","Achat","Rabais sur achat","Transport à l'achat","Autre cout"];
          }
          if ($this->type_compteID=="Dépense") {
            $this->sous_type_compte = ["Charge fixe","Charge variable"];
          }

        }
        else {
          $this->sous_type_compte = [];
        }
    }

    public function updated()
    {
        // Credit
        $this->realTimeFetchCredit();
        // Facture
        $this->realTimeFetchFacture();
        // Chèque
        $this->realTimeFetchCheque();
        // Dépense
        $this->realTimeFetchDepense();
          //type compte
        $this->realType_compteID();
    }

    public function render()
    {
      if (isset($_GET['filtre'])) {
        $Depenses = $this->DepenseFiltre;
      }else {
        $Depenses = $this->Depense;
      }
        $Session = $this->Session;
        $PageName = "Liste des dépenses";

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
        $data = getDepenseDataBySession();
        return view('depense::livewire.index', compact('PageName', 'Session', 'Depenses','data'));
    }
}
