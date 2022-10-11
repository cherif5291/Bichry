<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'banque_id',
        'caisse_id',
        'motif',
        'montant',
        'pre_solde_banque',
        'post_solde_banque',
        'pre_solde_caisse',
        'post_solde_caisse',
        'type',
    ];

    protected $searchableFields = ['*'];

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }
}
