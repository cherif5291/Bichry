<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'nom',
        'description',
        'prix_unitaire',
        'quantite',
        'image',
    ];

    protected $searchableFields = ['*'];

    public function facturesArticles()
    {
        return $this->hasMany(FacturesArticle::class);
    }

    public function devisArticles()
    {
        return $this->hasMany(DevisArticle::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function categoriesArticle()
    {
        return $this->belongsTo(CategoriesArticle::class, 'categories_article_id');
    }

    public function recusVentes()
    {
        return $this->hasMany(RecusVente::class);
    }
}
