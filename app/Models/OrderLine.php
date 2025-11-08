<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $table = 'order_line';
    protected $primaryKey = 'order_line_id';

    protected $fillable = [
        'product_item_id',
        'shop_order_id',
        'quantity',
        'price',
    ];

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }

    public function shoppingOrder()
    {
        return $this->belongsTo(ShoppingOrder::class, 'shop_order_id');
    }

}
