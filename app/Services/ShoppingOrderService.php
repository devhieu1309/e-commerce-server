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

        $customerAddress = $order->customerAddress;

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
            'address' => [
                'customer_address_id' => $customerAddress->customer_address_id ?? null,
                'name' => $customerAddress->name ?? '',
                'phone' => $customerAddress->phone ?? '',
                'detailed_address' => $customerAddress->detailed_address ?? '',
                'provinces_id' => $customerAddress->provinces_id ?? null,
                'wards_id' => $customerAddress->wards_id ?? null,
            ],
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

    public function createOrder($data)
    {
        [$addressId, $customerAddressId] = $this->handleAddress($data['user_id'], $data['address']);

        [$orderTotal, $orderLines] = $this->calculateOrderTotalAndLines($data['items']);

        $order = $this->repo->createOrder([
            'user_id' => $data['user_id'],
            'order_date' => now(),
            'payment_type_id' => $data['payment_type_id'],
            'address_id' => $addressId,
            'customer_address_id' => $customerAddressId,
            'shipping_method_id' => $data['shipping_method_id'],
            'order_total' => $orderTotal,
            'order_status_id' => $this->getInitStatusId(),
        ]);


        foreach ($orderLines as $line) {
            $this->repo->addOrderLine($order->shop_order_id, $line['product_item_id'], $line['quantity'], $line['price']);
        }

        return $this->getShoppingOrderDetail($order->shop_order_id);
    }

    private function handleAddress($userId, $addressData)
    {
        if (isset($addressData['customer_address_id'])) {
            $customerAddress = \App\Models\CustomerAddress::findOrFail($addressData['customer_address_id']);
        } else {
            $customerAddress = \App\Models\CustomerAddress::create([
                'user_id' => $userId,
                'name' => $addressData['name'] ?? null,
                'phone' => $addressData['phone'] ?? null,
                'detailed_address' => $addressData['detailed_address'],
                'provinces_id' => $addressData['provinces_id'],
                'wards_id' => $addressData['wards_id'],
                'isDefault' => $addressData['isDefault'] ?? 0,
            ]);
        }

        $address = \App\Models\Address::create([
            'detailed_address' => $customerAddress->detailed_address,
            'provinces_id' => $customerAddress->provinces_id,
            'wards_id' => $customerAddress->wards_id,
        ]);

        return [$address->address_id, $customerAddress->customer_address_id];
    }

    private function calculateOrderTotalAndLines($items)
    {
        $total = 0;
        $lines = [];
        foreach ($items as $item) {
            $productItem = \App\Models\ProductItem::findOrFail($item['product_item_id']);
            $quantity = $item['quantity'];
            $linePrice = $productItem->price;
            $total += $linePrice * $quantity;
            $lines[] = [
                'product_item_id' => $productItem->product_item_id,
                'quantity' => $quantity,
                'price' => $linePrice,
            ];
        }
        return [$total, $lines];
    }

    private function getInitStatusId()
    {
        return \App\Models\Order_Status::where('status', 'Chờ xác nhận')->value('order_status_id');
    }

}
