<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfosSystem extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nom_plateforme',
        'description',
        'website',
        'telephone',
        'portable',
        'logo_couleur',
        'logo_blanc',
        'fav_icon',
        'email_contact',
        'email_support',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'infos_systems';
}
