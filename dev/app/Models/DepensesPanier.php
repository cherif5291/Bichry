<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepensesPanier extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['clients_entreprise_id', 'depense_id'];

    protected $searchableFields = ['*'];

    protected $table = 'depenses_paniers';

    public function clientsEntreprises()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function comptesComptable()
    {
        return $this->belongsTo(Comptescomptable::class);
    }

    public function taxe()
    {
        return $this->belongsTo(Taxe::class);
    }

    public function depense()
    {
        return $this->belongsTo(Depense::class);
    }

}
