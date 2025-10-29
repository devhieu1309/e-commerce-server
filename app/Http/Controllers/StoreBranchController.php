<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreBranchRequest;
use App\Http\Requests\UpdateStoreBranchRequest;
use App\Models\StoreBranch;
use App\Services\StoreBranchService;
use Exception;
use Illuminate\Http\Request;

class StoreBranchController extends Controller
{
    protected $storeBranchService;

    // Inject service vào constructor
    public function __construct(StoreBranchService $storeBranchService)
    {
        $this->storeBranchService = $storeBranchService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $storeBranches = $this->storeBranchService->getAll();
            return response()->json([
                'success' => true,
                'storeBranches' => $storeBranches
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        // lay danh sach phuong thuc van chuyen
        $storeBranches = StoreBranch::all();
        return response()->json($storeBranches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreBranchRequest $request)
    {
        // Lấy dữ liệu cần thiết từ request
        $data = $request->validated();
        try {
            $storeBranch = $this->storeBranchService->saveStoreBranchData($data);
            return response()->json([
                'success' => true,
                'message' => 'Thêm chi nhánh thành công.',
                'data' => $storeBranch
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
            $storeBranch = $this->storeBranchService->getById($id);
            return response()->json([
                'success' => true,
                'storeBranch' => $storeBranch
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
    public function update(UpdateStoreBranchRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $storeBranch = $this->storeBranchService->updateStoreBranch($data, $id);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật chi nhánh thành công.',
                'data' => $storeBranch
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
            $storeBranch = $this->storeBranchService->deleteById($id);

            return response()->json([
                'success' => true,
                'message' => 'Xóa chi nhánh thành công.',
                'storeBranch' => $storeBranch
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
