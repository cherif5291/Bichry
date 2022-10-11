<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depense extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'client_id',
        'paiements_mode_id',
        'reference',
        'note',
        'source',
    ];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }


    public function facture()
    {
        return $this->belongsTo(Facture::class, 'facture_id');
    }

    public function depensesSimple()
    {
        return $this->belongsTo(DepensesSimple::class, 'depenses_simple_id');
    }

    public function creditFournisseurs()
    {
        return $this->belongsTo(FournisseursCredit::class, 'credit_fournisseur_id');
    }

    public function fournisseursCredit()
    {
        return $this->belongsTo(FournisseursCredit::class, 'fournisseurs_credit_id');
    }

    public function cheque()
    {
        return $this->belongsTo(Cheque::class, 'cheque_id');
    }


    public function depensesPaniers()
    {
        return $this->hasMany(DepensesPanier::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }

}
