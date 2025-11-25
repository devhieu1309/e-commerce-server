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

    /**
     * Lấy đơn hàng gần nhất của user để lấy địa chỉ giao hàng
     */
    public function getLatestOrderByUserId($userId)
    {
        return ShoppingOrder::with([
            'address.province',
            'address.ward',
            'user'
        ])
            ->where('user_id', $userId)
            ->orderByDesc('order_date')
            ->first();
    }

}
