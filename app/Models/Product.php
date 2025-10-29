<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(ProductItem::class, 'product_id', 'product_id');
    }
}