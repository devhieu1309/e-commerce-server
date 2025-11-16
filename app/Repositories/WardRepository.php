<?php

namespace App\Repositories;

use App\Models\Ward;

class WardRepository
{

    /**
     * @var Ward
     */
    protected $ward;


    public function __construct(Ward $ward)
    {
        $this->ward = $ward;
    }

    public function getWard()
    {
        return $this->ward->get();
    }

    public function getByProvince($provinceId)
    {
        return $this->ward->where('provinces_id', $provinceId)->get();
    }
}
