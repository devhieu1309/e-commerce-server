<?php

namespace App\Services;

use App\Repositories\AddressRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\WardRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class AddressService
{
    protected $addressRepository;
    protected $provinceRepository;
    protected $wardRepository;

    public function __construct(AddressRepository $addressRepository, ProvinceRepository $provinceRepository, WardRepository $wardRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->provinceRepository = $provinceRepository;
        $this->wardRepository = $wardRepository;
    }

    public function saveAddressData($data)
    {
        $result = $this->addressRepository->save($data);
        return $result;
    }

    public function getAllProvinces()
    {
        return $this->provinceRepository->getAll();
    }

    public function getWardsByProvince($provinceId)
    {
        return $this->wardRepository->getByProvince($provinceId);
    }
}
