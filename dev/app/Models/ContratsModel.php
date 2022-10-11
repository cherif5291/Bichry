<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContratsModel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['contrats_type_id', 'entreprise_id'];

    protected $searchableFields = ['*'];

    protected $table = 'contrats_models';

    public function contratsType()
    {
        return $this->belongsTo(ContratsType::class);
    }
    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
