<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $primaryKey = 'promotion_id';
    protected $fillable = [
        'promotion_name',
        'description',
        'discount_rate',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    // protected $casts = [
    //     'start_date' => 'datetime',
    //     'end_date' => 'datetime',
    // ];
}
