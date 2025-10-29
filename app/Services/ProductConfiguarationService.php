<?php

namespace App\Services;

use App\Repositories\ProductConfiguarationRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class ProductConfiguarationService
{
    protected $productConfiguarationRepository;

    public function __construct(ProductConfiguarationRepository $productConfiguarationRepository)
    {
        $this->productConfiguarationRepository = $productConfiguarationRepository;
    }

    public function saveProductConfiguarationData($data)
    {
        $result = $this->productConfiguarationRepository->save($data);

        return $result;
    }
}
