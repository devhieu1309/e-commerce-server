<?php

namespace App\Services;

use App\Repositories\StoreBranchRepository;
use App\Repositories\AddressRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class StoreBranchService
{
    /**
     * @var StoreBranchRepository
     */
    protected $storeBranchRepository;
    protected $addressRepository;

    public function __construct(StoreBranchRepository $storeBranchRepository, AddressRepository $addressRepository)
    {
        $this->storeBranchRepository = $storeBranchRepository;
        $this->addressRepository = $addressRepository;
    }

    // hàm lưu dữ liệu
    public function saveStoreBranchData($data)
    {
        // // tạo địa chỉ
        // $address = $this->storeBranchRepository->saveAddress($data);

        // // tạo chi nhánh với địa chỉ vừa tạo
        // $result = $this->storeBranchRepository->save($data, $address->address_id);
        // return $result->load('address.province', 'address.ward');

        // Nếu chưa có address_id mà có thông tin address => tạo mới địa chỉ
        if (empty($data['address_id']) && !empty($data['address'])) {
            $addressData = $data['address'];
            $address = $this->addressRepository->save($addressData);
            $data['address_id'] = $address->address_id;
        }
        DB::beginTransaction();
        try {
            $storeBranch = $this->storeBranchRepository->save($data);
            DB::commit();
            return $storeBranch;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception('Lỗi khi lưu chi nhánh: ' . $e->getMessage());
        }
    }

    public function getAll()
    {
        // return $this->storeBranchRepository->getAllStoreBranch();

        $storeBranches = $this->storeBranchRepository->getAllWithAddress();

        return $storeBranches->map(function ($storeBranch) {
            return [
                'store_branch_id' => $storeBranch->store_branch_id,
                'name' => $storeBranch->name,
                'phone_number' => $storeBranch->phone_number,
                'email' => $storeBranch->email,
                'opening_hours' => $storeBranch->opening_hours,
                'map_link' => $storeBranch->map_link,
                'address' => [
                    'address_id' => $storeBranch->address->address_id,
                    'detailed_address' => $storeBranch->address->detailed_address ?? null,
                    'ward' => $storeBranch->address->ward->name ?? null,
                    'province' => $storeBranch->address->province->full_name ?? null,
                ],
            ];
        });
    }

    public function getById($id)
    {
        return $this->storeBranchRepository->getById($id);
        
    }

    public function updateStoreBranch($data, $id)
    {
        DB::beginTransaction();
        try {
            $storeBranch = $this->storeBranchRepository->update($data, $id);
            if (!$storeBranch) {
                throw new Exception('Không tìm thấy chi nhánh cần cập nhật.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Lỗi khi sửa chi nhánh: ' . $e->getMessage());
        }

        DB::commit();

        return $storeBranch;
    }


    // public function deleteById($id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $storeBranch = $this->storeBranchRepository->delete($id);
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         Log::info($e->getMessage());

    //         throw new InvalidArgumentException("Failed to delete store branch.");
    //     }

    //     DB::commit();

    //     return $storeBranch;
    // }
    public function deleteStoreBranch($id)
    {
        DB::beginTransaction();

        try {
            // Tìm chi nhánh
            $storeBranch = $this->storeBranchRepository->find($id);

            if (!$storeBranch) {
                return [
                    'success' => false,
                    'message' => 'Chi nhánh không tồn tại',
                    'storeBranch'  => null,
                ];
            }

            // Gọi repository để xóa chi nhánh và địa chỉ liên quan
            $deletedBranch = $this->storeBranchRepository->delete($id);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Xóa chi nhánh thành công',
                'storeBranch'  => $deletedBranch,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi xóa chi nhánh: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'Lỗi khi xóa chi nhánh: ' . $e->getMessage(),
                'storeBranch'  => null,
            ];
        }
    }
}
