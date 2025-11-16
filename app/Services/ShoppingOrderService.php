<?php

namespace App\Services;

use App\Repositories\ShoppingOrderRepository;

class ShoppingOrderService
{
    protected $repo;

    public function __construct(ShoppingOrderRepository $repo)
    {
        $this->repo = $repo;
    }

    //Lấy danh sách tất cả đơn hàng
    public function getAllShoppingOrders()
    {
        $orders = $this->repo->getShoppingOrders();

        return $orders->map(function ($order) {
            return [
                'shop_order_id' => $order->shop_order_id,
                'user_name' => $order->user->name ?? 'Không xác định',
                'order_date' => $order->order_date,
                'payment_type' => $order->paymentMethod->value ?? '',
                'shipping_method' => $order->shippingMethod->shipping_method_name ?? '',
                'address' => $order->address->detailed_address ?? '',
                'order_total' => $order->order_total,
                'order_status' => $order->orderStatus->status ?? ''
            ];
        });
    }

    //Lấy chi tiết 1 đơn hàng
    public function getShoppingOrderDetail($id)
    {
        $order = $this->repo->getOrderDetail($id);
        if (!$order)
            return null;

        return [
            'shop_order_id' => $order->shop_order_id,
            'user_name' => $order->user->name ?? 'Không xác định',
            'order_date' => $order->order_date,
            'payment_type' => $order->paymentMethod->value ?? '',
            'shipping_method' => $order->shippingMethod->shipping_method_name ?? '',
            'address' => $order->address->detailed_address ?? '',
            'order_total' => $order->order_total,
            'order_status' => $order->orderStatus->status ?? '',
            'items' => $order->orderLines->map(function ($item) {
                return [
                    'product_item_id' => $item->product_item_id,
                    'product_name' => $item->productItem->product->product_name ?? 'Không có tên sản phẩm',
                    'image' =>  $item->productItem->image ?? null,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->price * $item->quantity,
                ];
            })
        ];

    }

    public function handle($id = null)
    {
        if ($id) {
            return $this->repo->getOrderDetail($id);
        }
        return $this->repo->getOrders();
    }
}
