<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarrantyRequest;
use App\Http\Requests\UpdateWarrantyRequest;
use App\Models\Warranty;
use App\Services\WarrantyService;
use Exception;
use Illuminate\Http\Request;


class WarrantyController extends Controller
{
    protected $warrantyService;

    public function __construct(WarrantyService $warrantyService)
    {
        $this->warrantyService = $warrantyService;
    }

    public function index()
    {
        try {
            $warranty = $this->warrantyService->getAll();
            return response()->json([
                'success' => true,
                'warranty' => $warranty
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreWarrantyRequest $request)
    {
        $data = $request->validated();
        try {
            $warranty = $this->warrantyService->saveWarrantyData($data);
            return response()->json([
                'success' => true,
                'message' => 'Sản phẩm bản hành được thêm thành công.',
                'data' => $warranty
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),

            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $warranty = $this->warrantyService->getById($id);
            return response()->json([
                'success' => true,
                'warranty' => $warranty
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateWarrantyRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $warranty = $this->warrantyService->updateWarranty($data, $id);

            return response()->json([
                'success' => true,
                'message' => "Cập nhật thông tin bảo hành thành công.",
                'data' => $warranty
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {

            $warranty = $this->warrantyService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => "Xóa sản phẩm bảo hành thành công.",
                'warranty' => $warranty
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function searchBySerial(string $serial)
    {
        try {
            $warranty = $this->warrantyService->searchBySerial($serial);

            if (!$warranty) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy thông tin bảo hành!',
                    'warranty' => null
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Tìm kiếm bảo hành thành công.',
                'warranty' => $warranty
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
