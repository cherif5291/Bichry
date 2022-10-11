<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FournisseursCredit extends Model
{
    use HasFactory;

    // public function entreprise()
    // {
    //     return $this->belongsTo(Entreprise::class);
    // }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function depense()
    {
        return $this->belongsTo(Depense::class, 'depense_id');
    }
}
