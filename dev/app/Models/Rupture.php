<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rupture extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['invitation_id', 'entreprise_id', 'status'];

    protected $searchableFields = ['*'];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
