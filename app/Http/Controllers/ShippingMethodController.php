<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingMethodRequest;
use App\Http\Requests\UpdateShippingMethodRequest;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lay danh sach phuong thuc van chuyen
        $shipping_methods = ShippingMethod::all();
        // return response()->json(['success' => true, 'shipping_methods' => $shipping_methods], 200);
        return response() -> json($shipping_methods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingMethodRequest $request)
    {
        $validated = $request->safe()->only('shipping_method_name', 'shipping_method_price');
        $shipping_method = ShippingMethod::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thêm phương thức vận chuyển thành công',
            'data' => $shipping_method
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shipping_method = ShippingMethod::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Lấy thông tin phương thức vận chuyển thành công.',
            'data' => $shipping_method
        ], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingMethodRequest $request, $id)
    {
        $shipping_method = ShippingMethod::findOrFail($id);

        $shipping_method->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật phương thức vận chuyển thành công.',
            'data' => $shipping_method
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shipping_method = ShippingMethod::findOrFail($id);
        $shipping_method->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa phương thức vận chuyển thành công',
            'deleted_id' => $id
        ]);
    }
}
