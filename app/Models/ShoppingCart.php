<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart';
    protected $primaryKey = 'shopping_cart_id';


    protected $fillable = [
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class, 'shopping_cart_id', 'shopping_cart_id');
    }
}
