<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $primaryKey = 'province_id';
    protected $fillable = ['name', 'full_name'];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id', 'province_id');
    }
}
