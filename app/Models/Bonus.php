<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['type', 'duree', 'abonnement_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'duree' => 'date',
    ];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }
}
