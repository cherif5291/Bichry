<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'nom_entreprise',
        'a_propos',
        'email',
        'telephone',
        'portable',
        'adresse',
        'capital',
        'logo',
        'modeles_devis_id',
        'modeles_facture_id',
        'modeles_recu_id',
        'devises_monetaire_id',
        'couleur_primaire',
        'couleur_secondaire',
    ];

    protected $searchableFields = ['*'];

    public function depenses()
    {
        return $this->hasMany(Depense::class, 'client_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function employesEntreprises()
    {
        return $this->hasMany(EmployesEntreprise::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function contratsModels()
    {
        return $this->hasMany(ContratsModel::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function caisses()
    {
        return $this->hasMany(Caisse::class);
    }

    public function paiementsModalites()
    {
        return $this->hasMany(PaiementsModalite::class);
    }

    public function ruptures()
    {
        return $this->hasMany(Rupture::class);
    }

    public function comptescomptables()
    {
        return $this->hasMany(Comptescomptable::class);
    }

    public function allDevis()
    {
        return $this->hasMany(Devis::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function fournisseursDepenses()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function modelesDevis()
    {
        return $this->belongsTo(ModelesDevis::class);
    }

    public function modelesFacture()
    {
        return $this->belongsTo(ModelesFacture::class);
    }

    public function modelesRecu()
    {
        return $this->belongsTo(ModelesRecu::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function clientsEntreprises()
    {
        return $this->hasMany(ClientsEntreprise::class);
    }

    public function devisesMonetaire()
    {
        return $this->belongsTo(DevisesMonetaire::class);
    }

    public function fournisseurs()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function paiementsource()
    {
        return $this->hasMany(Paiementsource::class);
    }


    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function contratsTypes()
    {
        return $this->hasMany(ContratsType::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function piecesJointes()
    {
        return $this->hasMany(PiecesJointe::class);
    }
}
