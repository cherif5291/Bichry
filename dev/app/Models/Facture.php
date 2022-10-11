<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'clients_entreprise_id',
        'paiements_modalite_id',
        'factures_article_id',
        'cc_cci',
        'echeance',
        'adresse_facturation',
        'numero_facture',
        'messsage',
        'message_affiche',
        'has_taxe',
        'fournisseur_id',
        'type',
    ];

    protected $searchableFields = ['*'];

    /* protected $casts = [
        'echeance' => 'date',
    ]; */

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }


    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function paiementsModalite()
    {
        return $this->belongsTo(PaiementsModalite::class);
    }

    public function depensesPaniers()
    {
        return $this->hasMany(DepensesPanier::class)->with('articles');
        // return $this->hasOneThrough(
        //     Article::class,
        //     DepensesPanier::class,
        //     'depense_id', // Foreign key on the DepensesPanier table...
        //     'id', // Foreign key on the Article table...
        //     'article_id', // Local key on the mechanics table...
        //     'id' // Local key on the cars table...
        // );
    }
    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function recurrences()
    {
        return $this->hasMany(Recurrence::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }

    public function depense()
    {
        return $this->belongsTo(Depense::class, 'depense_id');
    }
}
