<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingMethodRequest;
use App\Http\Requests\UpdateShippingMethodRequest;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use App\Services\ShippingMethodService;
use Exception;

class ShippingMethodController extends Controller
{
    protected $shippingMethodService;

    // Inject service vào constructor
    public function __construct(ShippingMethodService $shippingMethodService)
    {
        $this->shippingMethodService = $shippingMethodService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $shipping_methods = $this->shippingMethodService->getAll();
            return response()->json([
                'success' => true,                
                'shipping_methods' => $shipping_methods
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        // lay danh sach phuong thuc van chuyen
        $shipping_methods = ShippingMethod::all();
        return response()->json($shipping_methods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingMethodRequest $request)
    {
        // Lấy dữ liệu cần thiết từ request
        $data = $request->validated();
        try {
            $shipping_method = $this->shippingMethodService->saveShippingMethodData($data);
            return response()->json([
                'success' => true,
                'message' => 'Thêm phương thức vận chuyển thành công.',
                'data' => $shipping_method
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $shipping_method = $this->shippingMethodService->getById($id);
            return response()->json([
                'success' => true,
                'shipping_method' => $shipping_method
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingMethodRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $shipping_method = $this->shippingMethodService->updateShippingMethod($data, $id);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật phương thức vận chuyển thành công.',
                'data' => $shipping_method
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $shipping_method = $this->shippingMethodService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa phương thức vận chuyển thành công.',
                'shipping_method' => $shipping_method
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        
    }
}
