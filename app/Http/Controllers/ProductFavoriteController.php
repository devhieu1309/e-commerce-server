<?php

namespace App\Http\Controllers;

use App\Services\FavoriteService;
use Exception;
use Illuminate\Http\Request;

class ProductFavoriteController extends Controller
{
    //
    protected $favoriteService;

    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function index()
    {
        try {
            $favoriteProduct = $this->favoriteService->getAllFavoriteProduct();

            return response()->json([
                'message' => 'Lấy các sản phẩm yếu thích thành công.',
                'data' => $favoriteProduct
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                'error' => 'Lỗi lấy các sản phẩm yếu thích.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {

            $favoriteProduct = $this->favoriteService->saveFavoriteProduct($data);

            return response()->json([
                'message' => 'Thêm sản phẩm yêu thích thành công.',
                'data' => $favoriteProduct
            ], 200);
        } catch (Exception $e) {

            return response()->json([
                'error' => 'Lỗi khi thêm sản phẩm yêu thích.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
