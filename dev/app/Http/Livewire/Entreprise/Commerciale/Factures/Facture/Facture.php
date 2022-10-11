<?php

namespace App\Http\Livewire\Entreprise\Commerciale\Factures\Facture;

use App\Models\Article;
use App\Models\Banque;
use App\Models\Caisse;
use App\Models\ClientsEntreprise;
use App\Models\Comptescomptable;
use App\Models\DevisesMonetaire;
use App\Models\PaiementsModalite;
use App\Models\PaiementsMode;
use App\Models\Paiementsource;
use App\Models\Taxe;
use Livewire\Component;
use Livewire\WithPagination;

class Facture extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
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
        return view('livewire.entreprise.commerciale.factures.facture.facture', compact('Factures', 'Caisses', 'Banques','ModesPaiements','SourcesPaiement' ,'Taxes','DevisesMonetaires','ComptesComptables',  'Modalites', 'PageName', 'Clients', 'Articles'))
        ;
    }
}
