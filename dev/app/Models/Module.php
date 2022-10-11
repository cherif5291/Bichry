<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom'];

    protected $searchableFields = ['*'];

    public function modulePacks()
    {
        return $this->hasMany(ModulePack::class);
    }

    public function fonctionnalites()
    {
        return $this->hasMany(Fonctionnalite::class);
    }

    public function habilitations()
    {
        return $this->hasMany(Habilitation::class);
    }
}
