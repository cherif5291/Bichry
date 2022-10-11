<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fonctionnalite extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'module_id',
        'nom',
        'description',
        'voir',
        'ajouter',
        'supprimer',
        'modifier',
        'exporter',
    ];

    protected $searchableFields = ['*'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function habilitation()
    {
        return $this->belongsTo(Habilitation::class);
    }
}
