<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warranty extends Model
{
    //
    use HasFactory;

    protected $table = 'warranty';
    protected $fillable = [
        'serial_number',
        'warranty_status',
        'warranty_start',
        'warranty_expiry',
        'branch',
        'description',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
