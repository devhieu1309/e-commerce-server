<?php

namespace App\Services;

use App\Repositories\ShoppingOrderRepository;
use App\Models\User;

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
            'total_amount' => $totalAmount
        ];

    }

    public function handle($id = null)
    {
        if ($id) {
            return $this->repo->getOrderDetail($id);
        }
        return $this->repo->getOrders();
    }

    /**
     * Lấy thông tin user và địa chỉ giao hàng gần nhất để điền sẵn vào form nhận hàng
     */
    public function getDeliveryInfo($userId)
    {
        // Lấy thông tin user
        $user = User::find($userId);
        
        if (!$user) {
            return null;
        }

        // Lấy đơn hàng gần nhất của user
        $latestOrder = $this->repo->getLatestOrderByUserId($userId);

        // Chuẩn bị dữ liệu trả về
        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'phone' => $user->phone,
            'detailed_address' => null,
            'province_id' => null,
            'province_name' => null,
            'ward_id' => null,
            'ward_name' => null,
        ];

        // Nếu có đơn hàng gần nhất, lấy thông tin địa chỉ đầy đủ
        if ($latestOrder && $latestOrder->address) {
            $address = $latestOrder->address;
            
            // Địa chỉ chi tiết
            $data['detailed_address'] = $address->detailed_address;
            
            // Thông tin tỉnh/thành phố
            if ($address->province) {
                $data['province_id'] = $address->province->provinces_id;
                $data['province_name'] = $address->province->name ?? $address->province->full_name;
            }
            
            // Thông tin xã/phường
            if ($address->ward) {
                $data['ward_id'] = $address->ward->wards_id;
                $data['ward_name'] = $address->ward->name ?? $address->ward->full_name;
            }
        }

        return $data;
    }
}
