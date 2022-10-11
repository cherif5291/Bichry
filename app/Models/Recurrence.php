<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recurrence extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'facture_id',
        'paie_id',
        'interval_jour',
        'prochain_date',
        'regle_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'prochain_date' => 'date',
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function reglement()
    {
        return $this->belongsTo(Paie::class);
    }

    public function regle()
    {
        return $this->belongsTo(Regle::class);
    }
}
