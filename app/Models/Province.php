<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'provinces_id';
    protected $fillable = ['countries_id', 'name', 'full_name'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'countries_id', 'countries_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'provinces_id', 'provinces_id');
    }
}
