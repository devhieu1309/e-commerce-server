<?php

namespace App\Services;

use App\Repositories\WarrantyRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class WarrantyService
{
    /**
     * @var WarrantyRepository
     */
    protected $warrantyRepository;

    public function __construct(WarrantyRepository $warrantyRepository)
    {
        $this->warrantyRepository = $warrantyRepository;
    }

    // hàm lưu dữ liệu
    public function saveWarrantyData($data)
    {
        $result = $this->warrantyRepository->save($data);
        return $result;
    }

    public function getAll()
    {
        return $this->warrantyRepository->getAllWarranty();
    }

    public function getById($id)
    {
        $warranty = $this->warrantyRepository->getById($id)->first();

        if (!$warranty) {
            throw new InvalidArgumentException("Không tìm thấy thông tin bảo hành.");
        }

        return $warranty;
    }

    public function updateWarranty($data, $id)
    {
        DB::beginTransaction();
        try {
            $warranty = $this->getById($id); // kiểm tra tồn tại
            $updated = $this->warrantyRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Cập nhật bảo hành thất bại.");
        }

        DB::commit();

        return $updated;
    }


    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $warranty = $this->getById($id); // kiểm tra tồn tại
            $deleted = $this->warrantyRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Xóa bảo hành thất bại.");
        }

        DB::commit();

        return $deleted;
    }

    public function searchBySerial(string $serial)
    {
        $warranty = $this->warrantyRepository->searchBySerialNumbel($serial);
        return $warranty;
    }
}
