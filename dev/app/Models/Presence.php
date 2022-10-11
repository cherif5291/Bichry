<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'employes_entreprise_id',
        'date',
        'heure_arrive',
        'heure_depard',
        'temps_absence',
        'est_present',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function employesEntreprise()
    {
        return $this->belongsTo(EmployesEntreprise::class);
    }
}
