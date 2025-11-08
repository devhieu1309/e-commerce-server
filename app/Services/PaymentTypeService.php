<?php

namespace App\Services;

use App\Repositories\PaymentTypeRepository;

class PaymentTypeService {

    protected $paymentTypeRepository;

    public function __construct(PaymentTypeRepository $paymentTypeRepository) 
    {
        $this->paymentTypeRepository = $paymentTypeRepository;
    }

    public function getAllPaymentType() 
    {
        return $this->paymentTypeRepository->getAllPaymentType();
    }

}