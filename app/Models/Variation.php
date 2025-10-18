<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';
    protected $primaryKey = 'variation_id';
    protected $fillable = [
        'variation_name',
        'category_id',
        'created_at',
        'updated_at'
    ];
}
