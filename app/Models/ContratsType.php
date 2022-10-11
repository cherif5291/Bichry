<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContratsType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['entreprise_id', 'nom'];

    protected $searchableFields = ['*'];

    protected $table = 'contrats_types';

    public function contratsModels()
    {
        return $this->hasMany(ContratsModel::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
