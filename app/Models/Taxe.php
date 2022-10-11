<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taxe extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom', 'taux'];

    protected $searchableFields = ['*'];

    public function facturesArticles()
    {
        return $this->hasMany(FacturesArticle::class);
    }

    public function devisArticles()
    {
        return $this->hasMany(DevisArticle::class);
    }

    public function depensesPanier()
    {
        return $this->hasMany(DepensesPanier::class);
    }
}
