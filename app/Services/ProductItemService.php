<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductItemRepository;
use App\Repositories\ProductConfiguarationRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class ProductItemService
{
    protected $productItemRepository;

    public function __construct(ProductItemRepository $productItemRepository)
    {
        $this->productItemRepository = $productItemRepository;
    }

    public function saveProductItemData($data)
    {
        $result = $this->productItemRepository->save($data);

        return $result;
    }

    public function findById($id)
    {
        return $this->productItemRepository->find($id);
    }

    public function updateProductItemData($productItem, $data)
    {
        return $this->productItemRepository->update($productItem, $data);
    }
}
