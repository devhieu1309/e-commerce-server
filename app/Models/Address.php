<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';
    protected $fillable = [
        'detailed_address',
        'provinces_id',
        'wards_id',
        'created_at',
        'updated_at'
    ];

    // Địa chỉ thuộc một phường
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    // Một địa chỉ có thể được dùng bởi nhiều chi nhánh
    public function storeBranches()
    {
        return $this->hasMany(StoreBranch::class);
    }
}
