<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'clients_entreprise_id',
        'facture_id',
        'paiements_mode_id',
        'reference',
        'cc_cci',
        'approvisionnememnt',
        'banque_id',
        'caisse_id',
        'montant_recu',
        'note',
    ];

    protected $searchableFields = ['*'];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function paiementsMode()
    {
        return $this->belongsTo(PaiementsMode::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }
}
