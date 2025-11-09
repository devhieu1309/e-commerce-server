<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $primaryKey = 'districts_id';
    protected $fillable = ['provinces_id', 'name', 'full_name'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id', 'provinces_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'districts_id', 'districts_id');
    }
}
