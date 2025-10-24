<?php

namespace App\Models;

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
    public function options()
    {
        return $this->belongsToMany(VariationOption::class);
        // return $this->belongsToMany(VariationOption::class, 'product_configurations', 'product_item_id', 'variation_option_id');
    }
}
