<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderStatusRequest;
use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\Order_Status;
use App\Services\OrderStatusService;
use Illuminate\Http\Request;
use Exception;

class OrderStatusController extends Controller
{
    //
    protected $orderStatusService;


    public function __construct(OrderStatusService $orderStatusService)
    {
        $this->orderStatusService = $orderStatusService;
    }

    public function index()
    {
        try {
            $orderStatus = $this->orderStatusService->getAll();

            return response()->json([
                'success' => true,
                'orderStatus' => $orderStatus
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    public function store(StoreOrderStatusRequest $request)
    {
        $data = $request->validated();
        try {
            $category = $this->orderStatusService->saveOrderStatusData($data);

            return response()->json([
                'success' => true,
                'message' => 'Phương thanh toán đã được tạo thành công.',
                'data' => $category
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function show($id)
    {
        $orderStatus = Order_Status::findOrFail($id);

        return response()->json($orderStatus);
    }

    public function destroy($id)
    {
        try {
            $orderStatus = $this->orderStatusService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa phương thanh toán thành công.',
                'orderStatus' => $orderStatus,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function update(UpdateOrderStatusRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $orderStatus = $this->orderStatusService->updateOrderStatus($data, $id);

            return response()->json([
                'success' => true,
                'message' => 'Phương thanh toán đã được cập nhật thành công.',
                'data' => $orderStatus
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getVariationByOrderStatus(Order_Status $order_status)
    {
        $variations = $order_status->variations;
        return response()->json([
            'orderStatus' => $order_status,
            'variations' => $variations,
        ]);
    }

    public function search(Request $request)
    {

        $status = trim($request->query('status'));

        if (!$status) {
            return response()->json(Order_Status::all());
        }

        $status = Order_Status::where('status', 'LIKE', '%' . $status . '%')

            ->orderByRaw(
                "CASE 
            WHEN status LIKE ? THEN 1
            WHEN status LIKE ? THEN 2
            WHEN status LIKE ? THEN 3
            ELSE 4 END",
                [
                    $status,
                    $status . '%',
                    '%' . $status . '%'
                ]
            )
            ->limit(3)
            ->get();

        return response()->json($status);
    }
}
