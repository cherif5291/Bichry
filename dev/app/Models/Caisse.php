<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caisse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entreprise_id', 'nom', 'solde'];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function recusVentes()
    {
        return $this->hasMany(RecusVente::class);
    }
}
