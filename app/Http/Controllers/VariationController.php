<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Services\VariationService;
use Exception;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    protected $variationService;

    public function __construct(VariationService $variationService)
    {
        $this->variationService = $variationService;
    }

    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        try {
            $variations = $this->variationService->getAll();

            return response()->json([
                'success' => true,
                'variations' => $variations
            ], 200);
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
    public function store(StoreVariationRequest $request)
    {
        $data = $request->validated();
        try {
            $variation = $this->variationService->saveCategoryData($data);

            return response()->json([
                'success' => true,
                'message' => 'Biến thể sản phẩm đã được tạo thành công.',
                'data' => $variation
            ], 201);
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
            $variation = $this->variationService->getById($id);
            return response()->json([
                'success' => false,
                'variation' => $variation
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
    public function update(UpdateVariationRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $variation = $this->variationService->updateCategory($data, $id);

            return response()->json([
                'success' => true,
                'message' => 'Biến thể sản phẩm đã được cập nhật thành công.',
                'data' => $variation
            ], 201);
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
            $variation = $this->variationService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa biến thể sản phẩm thành công.',
                'variation' => $variation,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
    * Get varations by category
    */
    // public function getVariationByCategory(Category $category)
    // {
    //     $variations = $category->variations; 
    //     return response()->json([
    //         'category' => $category,
    //         'variations' => $variations,
    //     ]);
    // }
}
