<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return response()->json(['success' => true, 'promotions' => $promotions], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionRequest $request)
    {
        $validated = $request->validated();
        $promotion = Promotion::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Chương trình khuyến mãi đã được tạo thành công.',
            'data' => $promotion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Lấy thông tin chương trình khuyến mãi thành công.',
            'data' => $promotion
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $promotion->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật chương trình khuyến mãi thành công.',
            'data' => $promotion
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa chương trình khuyến mãi thành công',
            'deleted_id' => $id
        ]);
    }
}
