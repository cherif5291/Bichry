<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paie extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'employes_entreprise_id',
        'date',
        'montant_paye',
        'restant',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function recurrences()
    {
        return $this->hasMany(Recurrence::class);
    }

    public function employesEntreprise()
    {
        return $this->belongsTo(EmployesEntreprise::class);
    }
}
