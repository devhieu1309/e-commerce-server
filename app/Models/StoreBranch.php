<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreBranch extends Model
{
    use HasFactory;
    protected $table = 'store_branches';
    protected $primaryKey = 'store_branch_id';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'opening_hours',
        'address_id',
        'latitude',
        'longitude',
        'map_link',
        'created_at',
        'updated_at'
    ];

    // Chi nhánh thuộc một địa chỉ
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }

    // Truy ngược đến tỉnh (thông qua địa chỉ)
    public function province()
    {
        return $this->hasOneThrough(
            Province::class,
            Address::class,
            'address_id',
            'provinces_id',
            'address_id',
            'provinces_id'
        );
    }

    // Truy ngược đến phường (thông qua địa chỉ)
    public function ward()
    {
        return $this->hasOneThrough(
            Ward::class,
            Address::class,
            'address_id',
            'wards_id',
            'address_id',
            'wards_id'
        );
    }
}
