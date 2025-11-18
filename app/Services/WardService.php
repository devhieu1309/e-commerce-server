<?php

namespace App\Services;

use App\Repositories\WardRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class WardService
{
    protected $wardRepository;

    public function __construct(WardRepository $wardRepository)
    {
        $this->wardRepository = $wardRepository;
    }

    public function getWardsByProvince($provinceId)
    {
        return $this->wardRepository->getByProvince($provinceId);
    }
}
