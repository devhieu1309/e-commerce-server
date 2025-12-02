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

    public function getOrdersByUserId($userId)
    {
        return ShoppingOrder::with([
            'user',
            'paymentMethod',
            'shippingMethod',
            'address',
            'orderStatus',
            'orderLines',
            'orderLines.productItem',
            'orderLines.productItem.product',
        ])
            ->where('user_id', $userId)
            ->orderByDesc('order_date')
            ->get();
    }

    /**
     * Cập nhật trạng thái đơn hàng
     */
    public function updateOrderStatus($orderId, $newStatusId)
    {
        $order = ShoppingOrder::findOrFail($orderId);
        $order->order_status_id = $newStatusId;
        $order->save();
        return $order->fresh('orderStatus');
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
