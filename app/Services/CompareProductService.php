<?php

namespace App\Services;

use App\Repositories\CompareProductRepository;

class CompareProductService
{
    protected $compareProductRepository;

    public function __construct(CompareProductRepository $compareProductRepository)
    {
        $this->compareProductRepository = $compareProductRepository;
    }


    public function getAllCompare()
    {
        $result = $this->compareProductRepository->getAll();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->compareProductRepository->getById($id);
        return $result;
    }

    public function saveCompareProduct($data)
    {
        $result = $this->compareProductRepository->save($data);
        return $result;
    }

    public function updateCompareProduct($data, $id)
    {
        $result = $this->compareProductRepository->update($data, $id);
        return $result;
    }

    public function deleteCompareProduct($id)
    {
        $result = $this->compareProductRepository->delete($id);
        return $result;
    }
}
