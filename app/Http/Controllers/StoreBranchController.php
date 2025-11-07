<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoreBranchRequest;
use App\Http\Requests\UpdateStoreBranchRequest;
use App\Models\StoreBranch;
use App\Services\StoreBranchService;
use App\Services\AddressService;
use Exception;
use Illuminate\Http\Request;

class StoreBranchController extends Controller
{
    protected $storeBranchService;
    protected $addressService;

    // Inject service vào constructor
    public function __construct(StoreBranchService $storeBranchService, AddressService $addressService)
    {
        $this->storeBranchService = $storeBranchService;
        $this->addressService = $addressService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // try {
        //     // Gọi Service để lấy danh sách sản phẩm
        //     $products = $this->productService->getAllProductsWithItems();

        //     return response()->json([
        //         'message' => 'Lấy danh sách sản phẩm thành công',
        //         'data' => $products
        //     ], 200);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'error' => 'Lỗi khi lấy danh sách sản phẩm: ' . $e->getMessage()
        //     ], 500);
        // }

        try {
            $storeBranches = $this->storeBranchService->getAll();
            return response()->json([
                'message' => 'Lấy danh sách chi nhánh thành công',
                'storeBranches' => $storeBranches
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi lấy danh sách chi nhánh: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreBranchRequest $request)
    {
        // Lấy dữ liệu cần thiết từ request
        $data = $request->validated();
        // try {
        //     $storeBranch = $this->storeBranchService->saveStoreBranchData($data);
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Thêm chi nhánh thành công.',
        //         'data' => $storeBranch
        //     ], 200);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage(),
        //     ], 500);
        // }

        try {
            $storeBranch = $this->storeBranchService->saveStoreBranchData($data);

            $storeBranch->load(['address.ward', 'address.province']);

            $storeBranch = [
                'store_branch_id' => $storeBranch->store_branch_id,
                'name' => $storeBranch->name,
                'phone_number' => $storeBranch->phone_number,
                'email' => $storeBranch->email,
                'opening_hours' => $storeBranch->opening_hours,
                'map_link' => $storeBranch->map_link,
                'created_at' => $storeBranch->created_at,
                'updated_at' => $storeBranch->updated_at,
                'address' => [
                    'address_id' => $storeBranch->address->address_id,
                    'detailed_address' => $storeBranch->address->detailed_address,
                    'ward' => $storeBranch->address->ward->name,
                    'province' => $storeBranch->address->province->full_name,
                ]
            ];

            return response()->json([
                'message' => 'Thêm chi nhánh thành công',
                'store_branch' => $storeBranch,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Lỗi khi thêm chi nhánh: ' . $e->getMessage(),
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

        $storeBranch = $this->storeBranchService->deleteStoreBranch($id);
        if ($storeBranch['success']) {
            return response()->json([
                'success' => true,
                'message' => $storeBranch['message'],
                'storeBranch' => $storeBranch['storeBranch'],
            ], 200);
        }
        return response()->json([
            'success' => false,
            'error' => $storeBranch['message'],
        ], 404);
    }
}
