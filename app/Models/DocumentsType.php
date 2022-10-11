<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentsType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom'];

    protected $searchableFields = ['*'];

    protected $table = 'documents_types';

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
