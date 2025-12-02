<?php

namespace App\Services;

use App\Repositories\PaymentTypeRepository;

class PaymentTypeService
{

    protected $paymentTypeRepository;

    public function __construct(PaymentTypeRepository $paymentTypeRepository)
    {
        $this->paymentTypeRepository = $paymentTypeRepository;
    }

    public function getAllPaymentType()
    {
        return $this->paymentTypeRepository->getAllPaymentType();
    }

    public function getById($id)
    {
        return $this->paymentTypeRepository->getById($id);
    }

    public function savePaymentType($data, $imagePath)
    {
        return $this->paymentTypeRepository->save($data, $imagePath);
    }

    public function updatePaymentType($data, $id, $imagePath = null)
    {
        return $this->paymentTypeRepository->update($data, $id, $imagePath);
    }

    public function deleteById($id)
    {
        $result = $this->paymentTypeRepository->delete($id);

        return $result;
    }
}
