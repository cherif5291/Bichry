<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientsEntreprise extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'nom',
        'prenom',
        'entreprise',
        'email',
        'telephone',
        'titre',
        'adresse',
        'ville',
        'province',
        'code_postale',
        'pays',
        'note',
        'paiements_mode_id',
        'paiements_modalite_id',
        'devises_monetaire_id',
        'logo',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'clients_entreprises';

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function depensesPaniers()
    {
        return $this->hasMany(DepensesPanier::class);
    }

    public function depensesSimples()
    {
        return $this->hasMany(DepensesSimple::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
    public function fournisseursCredits()
    {
        return $this->hasMany(FournisseursCredit::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }

    public function allDevis()
    {
        return $this->hasMany(Devis::class);
    }

    public function recusVentes()
    {
        return $this->hasMany(RecusVente::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function paiementsMode()
    {
        return $this->belongsTo(PaiementsMode::class);
    }

    public function paiementsModalite()
    {
        return $this->belongsTo(PaiementsModalite::class);
    }

    public function devisesMonetaire()
    {
        return $this->belongsTo(DevisesMonetaire::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }
}
