<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderStatusRequest;
use App\Models\Order_Status;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    //
    public function index()
    {
        $orderStatus = Order_Status::all();
        return  response()->json($orderStatus);
    }

    public function store(StoreOrderStatusRequest $request)
    {
        $validated = $request->safe()->only('status');
        $orderStatus = Order_Status::create($validated);

        return response()->json($orderStatus, 201);
    }


    public function show($id)
    {
        $orderStatus = Order_Status::findOrFail($id);

        return response()->json($orderStatus);
    }

    public function destroy($id)
    {
        $orderStatus = Order_Status::findOrFail($id);
        $orderStatus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa phương thanh toán thành công',
            'deleted_id' => $id
        ]);
    }


    public function update(StoreOrderStatusRequest $request, $id)
    {
        $orderStatus = Order_Status::findOrFail($id);

        $orderStatus->update([
            'status' => $request->get('status'),

        ]);

        return response()->json($orderStatus);
    }
}
