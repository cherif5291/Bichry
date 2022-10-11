<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devis extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'clients_entreprise_id',
        'cc_cci',
        'adresse_facturation',
        'expiration',
        'numero_devis',
        'message_devis',
        'message_releve',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'expiration' => 'date',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function devisArticles()
    {
        return $this->hasMany(DevisArticle::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }
}
