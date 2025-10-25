<?php

namespace App\Models;

use App\Http\Controllers\ProductConfiguration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'product_items';

    protected $primaryKey = 'product_item_id';

    protected $fillable = [
        'SKU',
        'qty_in_stock',
        'price',
        'image',
        'product_id',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function configurations()
    {
        return $this->hasMany(ProductConfiguration::class, 'product_item_id', 'product_item_id');
    }
}
