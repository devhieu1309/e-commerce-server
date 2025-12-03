<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $table = 'user_review';
    protected $primaryKey = 'user_review_id';

    protected $fillable = [
        'rating',
        'comment',
        'user_id',
        'shop_order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function shoppingOrder()
    {
        return $this->belongsTo(ShoppingOrder::class, 'shop_order_id', 'shop_order_id');
    }
}
