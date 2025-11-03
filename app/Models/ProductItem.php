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

    //  public function variationOptions()
    // {
    //     return $this->belongsToMany(
    //         VariationOption::class,
    //         'product_configurations',  // bảng trung gian
    //         'product_item_id',        // khóa ngoại trỏ đến product_item
    //         'variation_option_id'     // khóa ngoại trỏ đến variation_option
    //     );
    // }

    public function variationOptions()
    {
        return $this->belongsToMany(
            VariationOption::class,
            'product_configurations',
            'product_item_id',
            'variation_option_id'
        )->with('variation');
    }
}
