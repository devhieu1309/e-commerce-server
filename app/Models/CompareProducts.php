<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompareProducts extends Model
{
    //
    protected $primaryKey = 'compare_product_id';
    protected $fillable = [
        'product_item_id',
        'user_id'
    ];

    public function ProductItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id', 'product_item_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
