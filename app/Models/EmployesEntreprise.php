<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployesEntreprise extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'entreprise_id',
        'user_id',
        'prenom',
        'nom',
        'initial',
        'email',
        'telephone',
        'data_embauche',
        'interval_paiement',
        'duree_interval',
        'remuneration',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'employes_entreprises';

    protected $casts = [
        'data_embauche' => 'date',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paiementsMode()
    {
        return $this->belongsTo(PaiementsMode::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
    public function devisesMonetaire()
    {
        return $this->belongsTo(DevisesMonetaire::class);
    }


    public function paies()
    {
        return $this->hasMany(Paie::class);
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
