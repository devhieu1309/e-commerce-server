<?php

namespace App\Repositories;

use App\Models\PaymentType;

class PaymentTypeRepository
{

    protected $paymentType;

    public function __construct(PaymentType $paymentType)
    {
        $this->paymentType = $paymentType;
    }

    public function getAllPaymentType()
    {
        return $this->paymentType->get();
    }


    public function save($data, $imagePath)
    {
        $paymentType = new $this->paymentType;

        $paymentType->value = $data->value;
        $paymentType->image = $imagePath;

        $paymentType->save();

        return $paymentType->fresh();
    }

    public function update($data, $id, $imagePath = null)
    {
        $paymentType = $this->paymentType->findOrFail($id);

        // Nếu có ảnh mới thì xóa ảnh cũ
        if ($imagePath) {
            if ($paymentType->image && \Storage::disk('public')->exists($paymentType->image)) {
                \Storage::disk('public')->delete($paymentType->image);
            }

            $paymentType->image = $imagePath;
        }

        // Cập nhật các field khác
        $paymentType->value = $data->value;

        $paymentType->save();

        return $paymentType->fresh();
    }
    public function delete($id)
    {
        $paymentType = $this->paymentType->findOrFail($id);

        $paymentType->delete();

        return $paymentType;
    }

    public function getById($id)
    {
        return $this->paymentType->where("payment_type_id", $id)->get();
    }
}
