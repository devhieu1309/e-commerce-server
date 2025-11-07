<?php

namespace App\Repositories;

use App\Models\PaymentType;

class PaymentTypeRepository {

    protected $paymentType;

    public function __construct(PaymentType $paymentType) {
        $this->paymentType = $paymentType;
    }

    public function getAllPaymentType () {
        return $this->paymentType->get();
    }
}