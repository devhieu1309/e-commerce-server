<?php
namespace App\Services;

use App\Repositories\ShippingMethodRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ShippingMethodService{
    /**
     * @var ShippingMethodRepository
     */
    protected $shippingMethodRepository;

    public function __construct(ShippingMethodRepository $shippingMethodRepository)
    {
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    // hàm lưu dữ liệu
    public function saveShippingMethodData($data) {
        $result = $this->shippingMethodRepository->save($data);
        return $result;
    }

    public function getAll() {
        return $this->shippingMethodRepository->getAllShippingMethod();
    }

    public function getById($id) {
        return $this->shippingMethodRepository->getById($id);
    }

    public function updateShippingMethod($data, $id) {
        DB::beginTransaction();
        try {
            $shippingMethod = $this->shippingMethodRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update shipping method.");
        }

       DB::commit();

        return $shippingMethod;
    }


    public function deleteById($id) {
        DB::beginTransaction();
        try {
            $shippingMethod = $this->shippingMethodRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to delete shipping method.");
        }

       DB::commit();

        return $shippingMethod;
    }
}
?>
