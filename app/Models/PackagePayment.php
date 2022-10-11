<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePayment extends Model
{
    use HasFactory;
    protected $fillable = ['abonnement_id', 'montant'];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }
}
