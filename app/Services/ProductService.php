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

class ProductService
{
    protected $productRepository;
    protected $productItemRepository;
    protected $productConfiguarationRepository;

    public function __construct(ProductRepository $productRepository, ProductItemRepository $productItemRepository, ProductConfiguarationRepository $productConfiguarationRepository)
    {
        $this->productRepository = $productRepository;
        $this->productItemRepository = $productItemRepository;
        $this->productConfiguarationRepository = $productConfiguarationRepository;
    }

    public function saveProductData($data)
    {
        $result = $this->productRepository->save($data);

        return $result;
    }

    // public function getAll()
    // {
    //     return $this->productRepository->getAllProduct();
    // }

    // public function getById($id)
    // {
    //     return $this->productRepository->getById($id);
    // }

    // public function updateCategory($data, $id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $product = $this->productRepository->update($data, $id);
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         Log::info($e->getMessage());

    //         throw new InvalidArgumentException("Failed to update product.");
    //     }

    //    DB::commit();

    //     return $product;
    // }

    // public function deleteById($id){
    //     DB::beginTransaction();

    //     try{
    //         $product = $this->productRepository->delete($id);
    //     }catch(Exception $e){
    //         DB::rollBack();
    //         Log::info($e->getMessage());

    //         throw new InvalidArgumentException("Unable to delete product data.");
    //     }

    //     DB::commit();

    //     return $product;
    // }
}
