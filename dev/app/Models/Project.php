<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'clients_entreprise_id',
        'nom',
        'description',
        'cout',
        'dead_line',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dead_line' => 'date',
    ];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }
}
