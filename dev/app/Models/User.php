<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    Use Billable;


    protected $fillable = ['prenom','nom', 'telephone', 'email', 'password', 'langue_id'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clients()
    {
        return $this->hasMany(Entreprise::class);
    }

    public function employesEntreprises()
    {
        return $this->hasMany(EmployesEntreprise::class);
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function habilitation()
    {
        return $this->belongsTo(Habilitation::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
