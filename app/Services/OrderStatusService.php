<?php

namespace App\Services;

use App\Repositories\OrderStatusRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;


class OrderStatusService
{

    /**
     * @var \App\Repositories\OrderStatusRepository
     */
    protected $orderStatusRepository;

    /**
     * orderStatusRepository contructor.
     * 
     * @param OrderStatusRepository $orderStatusRepository
     */
    public function __construct(OrderStatusRepository $orderStatusRepository)
    {
        $this->orderStatusRepository = $orderStatusRepository;
    }

    /**
     * Validate post data.
     * Store to DB if there are no error.
     * 
     * @param array $data
     *  @return \App\Models\Order_Status
     */
    public function saveOrderStatusData($data)
    {
        $result = $this->orderStatusRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->orderStatusRepository->getAllOrderStatus();
    }

    public function getById($id)
    {
        return $this->orderStatusRepository->getById($id);
    }

    public function updateOrderStatus($data, $id)
    {
        DB::beginTransaction();
        try {
            $orderStatus = $this->orderStatusRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update Order Status.");
        }

        DB::commit();

        return $orderStatus;
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $orderStatus = $this->orderStatusRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Unable to delete order status data.");
        }

        DB::commit();

        return $orderStatus;
    }
}
