<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'wards';
    protected $primaryKey = 'wards_id';
    protected $fillable = [
        'name',
        'full_name',
        'provinces_id',
        'administrative_unit_id',
        'created_at',
        'updated_at'
    ];

    // Một phường thuộc một tỉnh/thành
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Một phường có nhiều địa chỉ
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
