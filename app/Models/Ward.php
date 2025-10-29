<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $primaryKey = 'ward_id';
    protected $fillable = ['district_id', 'name', 'full_name'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }
}
