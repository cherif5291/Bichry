<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DevisArticle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'devis_id',
        'taxe_id',
        'article_id',
        'qte',
        'taux',
        'total',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'devis_articles';

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function taxe()
    {
        return $this->belongsTo(Taxe::class);
    }
}
