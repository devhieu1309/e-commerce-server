<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;
use App\Models\ShoppingOrder;
use App\Models\Province;
use App\Models\Ward;
use App\Models\PaymentType;
use App\Models\ShippingMethod;
use App\Models\Order_Status;
use Illuminate\Support\Facades\Hash;

class DeliveryInfoUserSeeder extends Seeder
{
    /**
     * Tạo user giả với đầy đủ thông tin để test API delivery-info
     */
    public function run(): void
    {
        // Kiểm tra xem user đã tồn tại chưa (user_id = 1)
        $user = User::find(1);
        
        if (!$user) {
            // Tạo user mới
            $user = User::create([
                'user_id' => 1,
                'name' => 'Nguyễn Văn A',
                'email' => 'test@example.com',
                'phone' => '0123456789',
                'password' => Hash::make('123456'),
                'role' => 'Người Dùng',
            ]);
        } else {
            // Cập nhật thông tin user nếu đã tồn tại
            $user->update([
                'name' => 'Nguyễn Văn A',
                'email' => 'test@example.com',
                'phone' => '0123456789',
            ]);
        }

        // Lấy hoặc tạo tỉnh/thành phố (Hà Nội)
        $province = Province::where('provinces_id', '01')->first();
        
        if (!$province) {
            $province = Province::create([
                'provinces_id' => '01',
                'name' => 'Hà Nội',
                'full_name' => 'Thành phố Hà Nội',
            ]);
        }

        // Lấy hoặc tạo xã/phường (Phường Ba Đình)
        $ward = Ward::where('wards_id', '00004')->first();
        
        if (!$ward) {
            $ward = Ward::create([
                'wards_id' => '00004',
                'name' => 'Ba Đình',
                'full_name' => 'Phường Ba Đình',
                'provinces_id' => '01',
            ]);
        }

        // Tạo địa chỉ
        $address = Address::where('address_id', 1)->first();
        
        if (!$address) {
            $address = Address::create([
                'address_id' => 1,
                'detailed_address' => '12 Phan Đình Phùng, Phường Ba Đình',
                'provinces_id' => '01',
                'wards_id' => '00004',
            ]);
        } else {
            $address->update([
                'detailed_address' => '12 Phan Đình Phùng, Phường Ba Đình',
                'provinces_id' => '01',
                'wards_id' => '00004',
            ]);
        }

        // Lấy payment type, shipping method, order status
        $paymentType = PaymentType::first();
        $shippingMethod = ShippingMethod::first();
        $orderStatus = Order_Status::first();

        if ($paymentType && $shippingMethod && $orderStatus) {
            // Tạo đơn hàng cho user này
            $existingOrder = ShoppingOrder::where('user_id', $user->user_id)->first();
            
            if (!$existingOrder) {
                ShoppingOrder::create([
                    'user_id' => $user->user_id,
                    'order_date' => now(),
                    'payment_type_id' => $paymentType->payment_type_id,
                    'address_id' => $address->address_id,
                    'shipping_method_id' => $shippingMethod->shipping_method_id,
                    'order_total' => 1000000,
                    'order_status_id' => $orderStatus->order_status_id,
                ]);
            } else {
                // Cập nhật đơn hàng để đảm bảo có địa chỉ đúng
                $existingOrder->update([
                    'address_id' => $address->address_id,
                    'order_date' => now(), // Cập nhật ngày để đảm bảo là đơn hàng gần nhất
                ]);
            }
        }

        $this->command->info('Đã tạo user giả với đầy đủ thông tin!');
        $this->command->info('User ID: ' . $user->user_id);
        $this->command->info('Email: ' . $user->email);
        $this->command->info('Tên: ' . $user->name);
        $this->command->info('SĐT: ' . $user->phone);
        $this->command->info('Địa chỉ: ' . $address->detailed_address);
        $this->command->info('Tỉnh/TP: ' . $province->name);
        $this->command->info('Xã/Phường: ' . $ward->name);
    }
}

