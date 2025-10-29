<?php
namespace App\Services;

use App\Repositories\StoreBranchRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class StoreBranchService{
    /**
     * @var StoreBranchRepository
     */
    protected $storeBranchRepository;

    public function __construct(StoreBranchRepository $storeBranchRepository)
    {
        $this->storeBranchRepository = $storeBranchRepository;
    }

    // hàm lưu dữ liệu
    public function saveStoreBranchData($data) {
        $result = $this->storeBranchRepository->save($data);
        return $result;
    }

    public function getAll() {
        return $this->storeBranchRepository->getAllStoreBranch();
    }

    public function getById($id) {
        return $this->storeBranchRepository->getById($id);
    }

    public function updateStoreBranch($data, $id) {
        DB::beginTransaction();
        try {
            $storeBranch = $this->storeBranchRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update store branch.");
        }

       DB::commit();

        return $storeBranch;
    }


    public function deleteById($id) {
        DB::beginTransaction();
        try {
            $storeBranch = $this->storeBranchRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to delete store branch.");
        }

       DB::commit();

        return $storeBranch;
    }
}
?>
