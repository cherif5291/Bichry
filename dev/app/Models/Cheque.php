<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function paiementsMode()
    {
        return $this->belongsTo(PaiementsMode::class);
    }
}
