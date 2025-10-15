<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ShippingMethod extends Model
{
    use HasFactory;
    protected $table = 'shipping_methods';
    protected $primaryKey = 'shipping_method_id';
    protected $fillable = [
        'shipping_method_name',
        'shipping_method_price',
        'created_at',
        'updated_at'
    ];
}
