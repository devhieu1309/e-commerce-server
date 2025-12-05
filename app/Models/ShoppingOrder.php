<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingOrder extends Model
{
    use HasFactory;

    protected $table = 'shopping_order';
    protected $primaryKey = 'shop_order_id';

    protected $fillable = [
        'user_id',
        'order_date',
        'payment_type_id',
        'address_id',
        'shipping_method_id',
        'order_total',
        'order_status_id',
        'customer_address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id', 'payment_type_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id', 'shipping_method_id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(Order_Status::class, 'order_status_id', 'order_status_id');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'shop_order_id', 'shop_order_id');
    }

    public function customerAddress()
    {
        return $this->belongsTo(CustomerAddress::class, 'customer_address_id', 'customer_address_id');
    }

}
