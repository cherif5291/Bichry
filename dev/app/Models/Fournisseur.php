<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'prenom',
        'nom',
        'entreprise',
        'email',
        'telephone',
        'titre',
        'adresse',
        'ville',
        'province',
        'code_postal',
        'pays',
        'note',
        'paiements_modalite_id',
        'numero_compte',
        'comptescomptable_id',
        'solde_ouverture',
        'date_ouverture',
        'devises_monetaire_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_ouverture' => 'date',
    ];

    public function paiementsModalite()
    {
        return $this->belongsTo(PaiementsModalite::class);
    }

    public function comptescomptable()
    {
        return $this->belongsTo(Comptescomptable::class);
    }

    public function devisesMonetaire()
    {
        return $this->belongsTo(DevisesMonetaire::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function depensesPanier()
    {
        return $this->hasMany(DepensesPanier::class);
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

    public function depensesSimples()
    {
        return $this->hasMany(DepensesSimple::class);
    }
    public function fournisseursCredits()
    {
        return $this->hasMany(FournisseursCredit::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
