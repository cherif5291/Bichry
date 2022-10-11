<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaiementsModalite extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entreprise_id'];

    protected $searchableFields = ['*'];

    protected $table = 'paiements_modalites';

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function fournisseursDepenses()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function clientsEntreprises()
    {
        return $this->hasMany(ClientsEntreprise::class);
    }
}
