<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeRegion extends Model
{
    use HasFactory;
    protected $table = 'administrative_regions';
    protected $primaryKey = 'adminnistrative_region_id';
    protected $fillable = [
        'name',
        'code_name',
        'created_at',
        'updated_at'
    ];

    public function administrativeUnits()
    {
        return $this->hasMany(AdministrativeUnit::class);
    }
}
