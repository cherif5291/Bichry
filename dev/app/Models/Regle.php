<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['banque_id', 'motif', 'montant'];

    protected $searchableFields = ['*'];

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function recurrences()
    {
        return $this->hasMany(Recurrence::class);
    }
}
