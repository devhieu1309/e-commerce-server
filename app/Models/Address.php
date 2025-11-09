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
        'user_id',
        'countries_id',
        'provinces_id',
        'districts_id',
        'wards_id',
        'name',
        'phone',
        'company',
        'detailed_address',
        'zip',
        'isDefault'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id', 'countries_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'provinces_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'districts_id', 'districts_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wards_id', 'wards_id');
    }
}
