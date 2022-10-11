<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entreprise_id'];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function modulePacks()
    {
        return $this->hasMany(ModulePack::class);
    }
}
