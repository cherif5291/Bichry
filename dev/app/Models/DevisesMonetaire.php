<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DevisesMonetaire extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom', 'sigle', 'taux_echange'];

    protected $searchableFields = ['*'];

    protected $table = 'devises_monetaires';

    public function clientsEntreprises()
    {
        return $this->hasMany(ClientsEntreprise::class);
    }
    public function employesEntreprises()
    {
        return $this->hasMany(EmployesEntreprise::class);
    }

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }

    public function fournisseursDepenses()
    {
        return $this->hasMany(Fournisseur::class);
    }
}
