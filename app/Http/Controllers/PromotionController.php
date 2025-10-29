<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use App\Services\PromotionService;
use Exception;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    protected $promotionService;

    // Inject service vào constructor
    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $promotions = $this->promotionService->getAll();
            return response()->json([
                'success' => true,                
                'promotions' => $promotions
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        // lay danh sach
        $promotions = Promotion::all();
        return response() -> json($promotions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionRequest $request)
    {
        $data = $request->validated();
        try {
            $promotion = $this->promotionService->savePromotionData($data);
            return response()->json([
                'success' => true,
                'message' => 'Thêm chương trình khuyến mãi thành công.',
                'data' => $promotion
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
            $promotion = $this->promotionService->getById($id);
            return response()->json([
                'success' => true,
                'promotion' => $promotion
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
    public function update(UpdatePromotionRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $promotion = $this->promotionService->updatePromotion($data, $id);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật chương trình khuyến mãi thành công.',
                'data' => $promotion
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
            $promotion = $this->promotionService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa chương trình khuyến mãi thành công.',
                'promotion' => $promotion
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
}
