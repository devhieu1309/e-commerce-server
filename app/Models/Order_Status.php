<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Status extends Model
{
    use HasFactory;
    protected $table = 'order_status';
    protected $primaryKey = 'order_status_id';


    protected $fillable = [
        'status'

    ];

    public function shoppingOrders()
    {
        return $this->hasMany(ShoppingOrder::class, 'order_status_id');
    }
}
