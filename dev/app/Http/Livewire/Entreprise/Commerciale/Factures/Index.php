<?php

namespace App\Http\Livewire\Entreprise\Commerciale\Factures;

use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\Facture;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\Paiementsource;
use App\Models\Taxe;
use Livewire\Component;

class Index extends Component
{

    public $article;
    public $Allarticles=[];
    public $InvoicesArticles=[];
    public $inputs = [];
    public $i = 1;



    public function mount(Article $article)
    {
        $this->article = $article;
        $this->inputs = [];
        $this->Allarticles = Article::all();


        if ($this->article) {
            foreach ($this->Allarticles as $key => $value) {
                # code...
            }
        }
    }

    public function render()
    {
        $inputs = $this->inputs;
        $i =  $this->i;
        $Factures = Facture::all();
        $PageName = "Liste des factures";
        $Clients = ClientsEntreprise::all();
        $Articles = Article::all();
        $Modalites = PaiementsModalite::all();
        $Taxes = Taxe::all();
        $DevisesMonetaires = DevisesMonetaire::all();
        $ComptesComptables = Comptescomptable::all();
        $ModesPaiements = PaiementsMode::all();
        $SourcesPaiement = Paiementsource::where('entreprise_id', auth()->user()->entreprise->id)->get();
        $Banques = Banque::where('entreprise_id', auth()->user()->entreprise->id)->get();
        $Caisses = Caisse::where('entreprise_id', auth()->user()->entreprise->id)->get();

        return view('livewire.entreprise.commerciale.factures.index', compact('inputs','i','Factures', 'Caisses', 'Banques','ModesPaiements','SourcesPaiement' ,'Taxes','DevisesMonetaires','ComptesComptables',  'Modalites', 'PageName', 'Clients', 'Articles'));
    }
}
