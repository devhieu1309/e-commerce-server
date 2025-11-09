<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'countries_id';
    protected $fillable = ['code', 'name', 'full_name'];

    public function provinces()
    {
        return $this->hasMany(Province::class, 'countries_id', 'countries_id');
    }
}
