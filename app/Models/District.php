<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $primaryKey = 'district_id';
    protected $fillable = ['province_id', 'name', 'full_name'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id', 'district_id');
    }
}
