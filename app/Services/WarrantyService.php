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
        return $this->warrantyRepository->getById($id);
    }

    public function updateWarranty($data, $id)
    {
        DB::beginTransaction();
        try {
            $warranty = $this->warrantyRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update warranty.");
        }

        DB::commit();

        return $warranty;
    }


    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $warranty = $this->warrantyRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to delete warranty.");
        }

        DB::commit();

        return $warranty;
    }

    public function searchBySerial(string $serial)
    {
        $warranty = $this->warrantyRepository->searchBySerialNumbel($serial);
        return $warranty;
    }
}
