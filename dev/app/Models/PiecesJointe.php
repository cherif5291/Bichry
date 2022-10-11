<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PiecesJointe extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'fichier',
        'recus_vente_id',
        'clients_entreprise_id',
        'devis_id',
        'facture_id',
        'reglement_id',
        'depense_id',
        'revenu_id',
        'entreprise_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'pieces_jointes';

    public function recusVente()
    {
        return $this->belongsTo(RecusVente::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function reglement()
    {
        return $this->belongsTo(Reglement::class);
    }

    public function depense()
    {
        return $this->belongsTo(Depense::class);
    }

    public function revenu()
    {
        return $this->belongsTo(Revenu::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
