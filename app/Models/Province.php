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
        'full_name'
    ];

    // Một tỉnh/thành có nhiều phường/xã
    public function wards()
    {
        return $this->hasMany(Ward::class, 'provinces_id', 'provinces_id');
    }

    // Một tỉnh/thành có nhiều địa chỉ
    public function Addresses()
    {
        return $this->hasMany(Address::class, 'provinces_id', 'provinces_id');
    }
}
