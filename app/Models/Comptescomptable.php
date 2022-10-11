<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comptescomptable extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom', 'numero_compte','type_compte','sous_type_compte','entreprise_id'];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function fournisseursDepenses()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function depense()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function depensesPanier()
    {
        return $this->hasMany(DepensesPanier::class);
    }
}
