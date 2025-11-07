<?php

namespace App\Repositories;

use App\Models\ShoppingOrder;

class ShoppingOrderRepository
{
    public function getShoppingOrders()
    {
        return ShoppingOrder::with([
            'user',
            'paymentMethod',
            'shippingMethod',
            'address'
        ])
            ->orderByDesc('order_date')
            ->get();
    }

    public function getOrderDetail($id)
{
    return ShoppingOrder::with([
        'user',
        'paymentMethod',
        'shippingMethod',
        'address',
        'orderStatus',
        'orderLines.productItem.product'
    ])->find($id);
}

}
