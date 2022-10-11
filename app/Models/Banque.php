<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banque extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nom',
        'numero_compte',
        'logo_banque',
        'entreprise_id',
    ];

    protected $searchableFields = ['*'];

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function regles()
    {
        return $this->hasMany(Regle::class);
    }

    public function recusVentes()
    {
        return $this->hasMany(RecusVente::class);
    }
}
