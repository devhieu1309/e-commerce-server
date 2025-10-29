<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeUnit extends Model
{
    use HasFactory;
    protected $table = 'administrative_units';
    protected $primaryKey = 'administrative_unit_id';
    protected $fillable = [
        'full_name',
        'short_name',
        'created_at',
        'updated_at'
    ];

    // Một đơn vị hành chính có nhiều tỉnh/thành
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    // Một đơn vị hành chính có nhiều phường/xã
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
