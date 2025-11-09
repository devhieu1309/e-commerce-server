<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'wards';
    protected $primaryKey = 'wards_id';
    protected $fillable = ['districts_id', 'name', 'full_name'];

    public function district()
    {
        return $this->belongsTo(District::class, 'districts_id', 'districts_id');
    }
}
