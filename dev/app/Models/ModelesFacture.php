<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelesFacture extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom', 'contenu'];

    protected $searchableFields = ['*'];

    protected $table = 'modeles_factures';

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class);
    }
}
