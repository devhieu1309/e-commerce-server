<?php

namespace App\Services;

use App\Repositories\ProvinceRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class ProvinceService
{
    protected $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function getAllProvinces()
    {
        return $this->provinceRepository->getAll();
    }
}
