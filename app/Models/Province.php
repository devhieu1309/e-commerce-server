<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'provinces_id';
    protected $fillable = [
        'name',
        'full_name',
        'administrative_unit_id',
        'created_at',
        'updated_at'
    ];

    // Một tỉnh/thành có nhiều phường/xã
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    // Một tỉnh/thành có nhiều địa chỉ
    public function Addresses()
    {
        return $this->hasMany(Address::class);
    }
}
