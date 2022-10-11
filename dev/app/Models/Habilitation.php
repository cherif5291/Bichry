<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habilitation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'habilitation',
        'module_id',
        'fonctionnalite_id',
    ];

    protected $searchableFields = ['*'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function fonctionnalites()
    {
        return $this->hasMany(Fonctionnalite::class);
    }
}
