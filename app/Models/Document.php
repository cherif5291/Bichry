<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'doc',
        'cabinet_id',
        'documents_type_id',
    ];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function documentsType()
    {
        return $this->belongsTo(DocumentsType::class);
    }
}
