<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFavorites extends Model
{
    //
    use HasFactory;

    protected $table = 'product_favorities';

    protected $primaryKey = 'product_favorite_id';

    protected $fillable = [
        'user_id',
        'product_item_id',
        'created_at',
        'updated_at'
    ];

    public function producItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_items', 'product_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }
}
