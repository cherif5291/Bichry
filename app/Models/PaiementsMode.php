<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaiementsMode extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom'];

    protected $searchableFields = ['*'];

    protected $table = 'paiements_modes';

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

    public function clientsEntreprises()
    {
        return $this->hasMany(ClientsEntreprise::class);
    }

    public function employesEntreprises()
    {
        return $this->hasMany(EmployesEntreprise::class);
    }

    public function recusVentes()
    {
        return $this->hasMany(RecusVente::class);
    }

    public function depensesSimples()
    {
        return $this->hasMany(DepensesSimple::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
