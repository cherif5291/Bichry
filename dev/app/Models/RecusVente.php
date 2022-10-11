<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecusVente extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'clients_entreprise_id',
        'cc_cci',
        'adresse_livraison',
        'date_recu_vente',
        'reference',
        'numero_recu',
        'article_id',
        'paiements_mode_id',
        'message_recu',
        'message_releve',
        'depose_sur',
        'caisse_id',
        'banque_id',
        'montant',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'recus_ventes';

    protected $casts = [
        'date_recu_vente' => 'date',
    ];

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function paiementsMode()
    {
        return $this->belongsTo(PaiementsMode::class);
    }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }
}
