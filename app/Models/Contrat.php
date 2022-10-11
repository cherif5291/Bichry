<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'status',
        'signature1',
        'signature2',
        'entreprise_id',
        'clients_entreprise_id',
        'employes_entreprise_id',
        'facture_id',
        'project_id',
        'fournisseur_id',
    ];

    protected $searchableFields = ['*'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function clientsEntreprise()
    {
        return $this->belongsTo(ClientsEntreprise::class);
    }

    public function employesEntreprise()
    {
        return $this->belongsTo(EmployesEntreprise::class);
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function contratsModel()
    {
        return $this->belongsTo(ContratsModel::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
