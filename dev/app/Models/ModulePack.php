<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModulePack extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['package_id', 'module_id'];

    protected $searchableFields = ['*'];

    protected $table = 'module_packs';

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
