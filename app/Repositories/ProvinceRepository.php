<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceRepository
{

    /**
     * @var Province
     */
    protected $province;


    public function __construct(Province $province)
    {
        $this->province = $province;
    }

    public function getAll()
    {
        return $this->province->get();
    }

    public function getById($id)
    {
        return $this->province->where("provinces_id", $id)->get();
    }
}
