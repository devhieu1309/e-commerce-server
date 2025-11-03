<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCartItem extends Model
{
    use HasFactory;
    protected $table = 'shopping_cart_item';
    protected $primaryKey = 'shopping_cart_item_id';

    protected $fillable = [
        'shopping_cart_id',
        'product_item_id',
        'quantity',
    ];

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id', 'shopping_cart_id');
    }

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id', 'product_item_id');

    }

    public function variationOptions()
    {
        return $this->belongsToMany(VariationOption::class, 'product_item_id', 'variation_option_id');
    }


}
