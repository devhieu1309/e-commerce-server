<?php

namespace App\Http\Controllers;

use App\Services\CompareProductService;
use Exception;
use Illuminate\Http\Request;

class CompareProductController extends Controller
{
    //
    protected $compareProductService;

    public function __construct(CompareProductService $compareProductService)
    {
        $this->compareProductService = $compareProductService;
    }

    public function index()
    {
        try {

            $compareProduct = $this->compareProductService->getAllCompare();

            return response()->json([
                'success' => true,
                'message' => "Lấy danh sách sản phẩm so sánh thành công",
                'data' => $compareProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => false,
                'success' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        try {
            $compareProduct = $this->compareProductService->findById($id);
            return response()->json([
                'success' => true,
                'data' => $compareProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate();
        try {

            $compareProduct = $this->compareProductService->saveCompareProduct($data);

            return response()->json([
                'success' => true,
                'message' => "Đã thêm thành sản phẩm vào bảng so sánh thành công.",
                'data' => $compareProduct
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate();
        try {

            $compareProduct = $this->compareProductService->updateCompareProduct($data, $id);

            return response()->json([
                'success' => true,
                'message' => "Đã cập nhật thành công sản phẩm khỏi bảng so sánh.",
                'data' => $compareProduct
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {

            $compareProduct = $this->compareProductService->deleteCompareProduct($id);

            return response()->json([
                'success' => true,
                'message' => "Đã xóa thành công sản phẩm khỏi bảng so sánh.",
                'data' => $compareProduct
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
