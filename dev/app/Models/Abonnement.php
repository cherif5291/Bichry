<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonnement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['expiration', 'entreprise_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'expiration' => 'date',
    ];

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function packagePayment()
    {
        return $this->hasMany(PackagePayment::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
