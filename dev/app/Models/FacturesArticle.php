<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacturesArticle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['article_id', 'qte', 'taux', 'total', 'taxe_id'];

    protected $searchableFields = ['*'];

    protected $table = 'factures_articles';

    public function factures()
    {
        return $this->hasMany(Facture::class);
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
