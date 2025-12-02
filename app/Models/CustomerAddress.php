<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Ward;

class CustomerAddress extends Model
{
    protected $table = 'customer_addresses';
    protected $primaryKey = 'customer_address_id';

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'company',
        'detailed_address',
        'provinces_id',
        'wards_id',
        'isDefault'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'provinces_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wards_id', 'wards_id');
    }
}
