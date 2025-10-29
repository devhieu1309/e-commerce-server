<?php
namespace App\Services;

use App\Repositories\PromotionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PromotionService{
    /**
     * @var PromotionRepository
     */
    protected $promotionRepository;

    public function __construct(PromotionRepository $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    // hàm lưu dữ liệu
    public function savePromotionData($data) {
        $result = $this->promotionRepository->save($data);
        return $result;
    }

    public function getAll() {
        return $this->promotionRepository->getAllPromotion();
    }

    public function getById($id) {
        return $this->promotionRepository->getById($id);
    }

    public function updatePromotion($data, $id) {
        DB::beginTransaction();
        try {
            $promotion = $this->promotionRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update promotion.");
        }

       DB::commit();

        return $promotion;
    }


    public function deleteById($id) {
        DB::beginTransaction();
        try {
            $promotion = $this->promotionRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to delete promotion.");
        }

       DB::commit();

        return $promotion;
    }
}
?>
