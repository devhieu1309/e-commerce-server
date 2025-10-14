<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingMethodRequest;
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
        return response()->json($shipping_methods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingMethodRequest $request)
    {
        $validated = $request->safe()->only('shipping_method_name', 'shipping_method_price');
        $shipping_method = ShippingMethod::create($validated);

        return response()->json($shipping_method, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $shipping_method = ShippingMethod::findOrFail($id);

        return response()->json($shipping_method);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShippingMethodRequest $request, $id)
    {
        $shipping_method = ShippingMethod::findOrFail($id);

        $shipping_method->update([
            'shipping_method_name' => $request->get('shipping_method_name'),
            'shipping_method_price' => $request->get('shipping_method_price'),
        ]);

        return response()->json($shipping_method);
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
