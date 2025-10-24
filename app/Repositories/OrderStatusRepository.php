<?php

namespace App\Repositories;

use App\Models\Order_Status;

class OrderStatusRepository
{
    /**
     * @var Order_Status 
     */
    protected $order_status;

    /**
     * CategoryRepository constructor
     * 
     * @param Category $order_status
     */

    public function __construct(Order_Status $order_status)
    {
        $this->order_status = $order_status;
    }

    /**
     * Save order_status
     *
     * @param $data
     * @return Order_Status
     */
    public function save($data)
    {
        $order_status = new $this->order_status;

        $order_status->status = $data['status'];

        $order_status->save();

        return $order_status->fresh();
    }

    public function getAllOrderStatus()
    {
        return $this->order_status->get();
    }

    public function getById($id)
    {
        return $this->order_status->where("id", $id)->get();
    }

    public function update($data, $id)
    {

        $order_status = $this->order_status->find($id);

        $order_status->status = $data['status'];


        $order_status->update();

        return $order_status;
    }

    public function delete($id)
    {
        $order_status = $this->order_status->find($id);
        $order_status->delete();

        return $order_status;
    }
}
