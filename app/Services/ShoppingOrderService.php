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

    /**
     * Trả về danh sách trạng thái hợp lệ
     */
    private function getValidNextStatusOptions($currentStatus)
    {
        $statuses = [
            'Chờ xác nhận' => ['Đã xác nhận', 'Hủy đơn'],
            'Đã xác nhận' => ['Chờ lấy hàng', 'Hủy đơn'],
            'Chờ lấy hàng' => ['Chờ giao hàng', 'Hủy đơn'],
            'Chờ giao hàng' => ['Đã giao', 'Trả hàng'],
            'Đã giao' => ['Trả hàng'],
        ];
        $nextOptions = $statuses[$currentStatus] ?? [];
        return \App\Models\Order_Status::whereIn('status', $nextOptions)->get();
    }

    //Lấy chi tiết 1 đơn hàng 
    public function getShoppingOrderDetail($id)
    {
        $order = $this->repo->getOrderDetail($id);
        if (!$order)
            return null;

        $items = $order->orderLines->map(function ($item) {
            return [
                'product_item_id' => $item->product_item_id,
                'product_name' => $item->productItem->product->product_name ?? 'Không có tên sản phẩm',
                'sku' => $item->productItem->SKU ?? '',
                'image' => $item->productItem->image ?? null,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'subtotal' => $item->price * $item->quantity, // Tổng của 1 order line
            ];
        });

        //Tổng của tất cả các item order line
        $subtotalAmount = $items->sum('subtotal');
        
        //Phí vận chuyển
        $shippingFee = $order->shippingMethod->shipping_method_price ?? 0;

        //Tổng đơn hàng = subtotal + phí vận chuyển
         $totalAmount = $subtotalAmount + $shippingFee;


        $validOptions = $this->getValidNextStatusOptions($order->orderStatus->status ?? null);

        return [
            'shop_order_id' => $order->shop_order_id,
            'user' => [
                'id' => $order->user->user_id ?? null,
                'name' => $order->user->name ?? 'Không xác định',
                'email' => $order->user->email ?? null,
                'phone' => $order->user->phone ?? null,
            ],
            'order_date' => $order->order_date,
            'payment_type' => $order->paymentMethod->value ?? '',
            'shipping_method' => $order->shippingMethod->shipping_method_name ?? '',
            'shipping_fee' => $shippingFee,
            // 'address' => $order->address->detailed_address ?? '',
            'order_status' => $order->orderStatus->status ?? '',
            'items' => $items,

            'subtotal_amount' => $subtotalAmount,
            'total_amount' => $totalAmount,
            'valid_next_status_options' => $validOptions,
        ];
    }

    //lấy danh sách đơn hàng theo user id
    public function getOrdersByUserId($userId)
    {
        $orders = $this->repo->getOrdersByUserId($userId);

        return $orders->map(function ($order) {
            $items = $order->orderLines->map(function ($item) {
                return [
                    'product_item_id' => $item->product_item_id,
                    'product_name' => $item->productItem->product->product_name,
                    'sku' => $item->productItem->SKU,
                    'image' => $item->productItem->image,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->price * $item->quantity,
                ];
            });

            $subtotalAmount = $items->sum('subtotal');
            $shippingFee = $order->shippingMethod->shipping_fee ?? 0;
            $discountAmount = 0;

            $totalAmount = $subtotalAmount + $shippingFee - $discountAmount;

            return [
                'shop_order_id' => $order->shop_order_id,
                'order_date' => $order->order_date,
                'payment_type' => $order->paymentMethod->value,
                'shipping_method' => $order->shippingMethod->shipping_method_name,
                'order_status' => $order->orderStatus->status,
                'subtotal_amount' => $subtotalAmount,
                'shipping_fee' => $shippingFee,
                'total_amount' => $subtotalAmount + $shippingFee - $discountAmount,
                'items' => $items,
            ];
        })->values();
    }

    public function handle($id = null)
    {
        if ($id) {
            return $this->repo->getOrderDetail($id);
        }
        return $this->repo->getOrders();
    }

    public function updateOrderStatus($orderId, $newStatusId)
    {
        $order = $this->repo->getOrderDetail($orderId);
        if (!$order)
            throw new \Exception('Đơn hàng không tồn tại.');
        $currentStatus = $order->orderStatus->status ?? null;
        $nextOptions = $this->getValidNextStatusOptions($currentStatus)->pluck('status')->toArray();
        $newStatus = \App\Models\Order_Status::find($newStatusId);
        if (!$newStatus)
            throw new \Exception('Trạng thái mới không tồn tại.');
        if (!in_array($newStatus->status, $nextOptions))
            throw new \Exception('Chuyển trạng thái không hợp lệ.');
        $updatedOrder = $this->repo->updateOrderStatus($orderId, $newStatusId);

        $validOptions = $this->getValidNextStatusOptions($newStatus->status);
        return [
            'order' => $updatedOrder,
            'valid_next_status_options' => $validOptions,
        ];
    }
}
