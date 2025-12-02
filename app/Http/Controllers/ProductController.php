<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductItem;
use App\Services\ProductService;
use App\Services\ProductConfiguarationService;
use App\Services\ProductItemService;
use App\Services\ProductC;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    // public function index()
    // {
    //     $products = Product::all();
    //     return response()->json($products);
    // }

    public function index()
    {
        // return "MINH HIEU";
        try {
            // Gọi Service để lấy danh sách sản phẩm
            $products = $this->productService->getAllProductsWithItems();

            return response()->json([
                'message' => 'Lấy danh sách sản phẩm thành công',
                'data' => $products
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi lấy danh sách sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $product = $this->productService->createProductWithItems($request);

            return response()->json([
                'message' => 'Thêm sản phẩm thành công',
                'product' => $product,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi tạo sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productService->getProductDetail($id);

            if (!$product) {
                return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
            }

            return response()->json([
                'message' => 'Lấy chi tiết sản phẩm thành công',
                'product' => $product
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi lấy chi tiết sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $result = $this->productService->deleteProduct($id);

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'product' => $result['product'],
            ], 200);
        }

        return response()->json([
            'success' => false,
            'error' => $result['message'],
        ], 404);
    }

    public function update(Request $request, $id)
    {
        try {
            $productResponse = $this->productService->updateProductWithItems($id, $request);

            if (!$productResponse) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy sản phẩm',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật sản phẩm thành công',
                'product' => $productResponse,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }
}
