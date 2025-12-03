<?php

namespace App\Http\Controllers;

use App\Models\ShoppingOrder;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Services\ShoppingOrderService;

class ShoppingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $shoppingOrderService;

    public function __construct(ShoppingOrderService $shoppingOrderService)
    {
        $this->shoppingOrderService = $shoppingOrderService;
    }
    public function index()
    {
        try {
            $shoppingOrder = $this->shoppingOrderService->getAllShoppingOrders();
            return response()->json($shoppingOrder, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'shipping_method_id' => 'required|exists:shipping_methods,shipping_method_id',
            'payment_type_id' => 'required|exists:payment_type,payment_type_id',
            'address' => 'required|array',
            'items' => 'required|array|min:1',
            'items.*.product_item_id' => 'required|exists:product_items,product_item_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        try {
            $order = $this->shoppingOrderService->createOrder($validated);
            return response()->json([
                'success' => true,
                'order' => $order,
                'message' => 'Đặt hàng thành công!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $orderDetail = $this->shoppingOrderService->getShoppingOrderDetail($id);
            return response()->json($orderDetail, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    public function getOrdersByUser($userId)
    {
        try {
            $orders = $this->shoppingOrderService->getOrdersByUserId($userId);
            return response()->json($orders, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingOrder $shoppingOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_status_id' => 'required|exists:order_status,order_status_id',
        ]);
        try {
            $result = $this->shoppingOrderService->updateOrderStatus($id, $request->order_status_id);
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái đơn hàng thành công.',
                'order' => $result['order'],
                'valid_next_status_options' => $result['valid_next_status_options'],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingOrder $shoppingOrder)
    {
        //
    }
}
