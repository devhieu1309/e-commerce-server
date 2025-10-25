<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class ProductConfiguaration extends Model
// {
//     use HasFactory;

//     protected $table = 'product_configurations';

//     // protected $primaryKey = 'product_configurations';

//     protected $fillable = [
//         'product_item_id',
//         'variation_option_id',
//     ];
// }

class ProductConfiguaration extends Model
{
    use HasFactory;

    protected $table = 'product_configurations';

    public $incrementing = false;
    protected $primaryKey = null;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'product_item_id',
        'variation_option_id',
    ];

    public function variationOption()
    {
        return $this->belongsTo(VariationOption::class, 'variation_option_id', 'variation_option_id');
    }
}
