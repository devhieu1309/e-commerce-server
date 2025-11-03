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
use Illuminate\Support\Facades\Storage;

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

    public function getProductDetail($productId)
    {
        // Lấy sản phẩm cùng với quan hệ liên quan
        $product = $this->productRepository->find($productId);

        if (!$product) {
            return null;
        }

        // Format lại dữ liệu trả về
        $data = [
            'product_id' => $product->product_id,
            'product_name' => $product->product_name,
            'description' => $product->description,
            'category' => $product->category->category_name ?? null,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'items' => $product->items->map(function ($item) {
                $variationLabels = $item->variationOptions->pluck('value')->toArray();

                return [
                    'product_item_id' => $item->product_item_id,
                    'variant_name' => implode(' – ', $variationLabels), // ví dụ "Đen – 128GB"
                    'sku' => $item->SKU,
                    'price' => number_format($item->price, 0, ',', '.') . ' đ',
                    'qty_in_stock' => $item->qty_in_stock,
                    'image' => $item->image ? asset($item->image) : null,
                ];
            }),
        ];

        return $data;
    }

    public function deleteProduct($id)
    {
        DB::beginTransaction();

        try {
            $product = $this->productRepository->find($id);

            if (!$product) {
                return ['success' => false, 'message' => 'Sản phẩm không tồn tại', 'product' => null];
            }

            // Xóa ảnh trong storage
            foreach ($product->items as $item) {
                if ($item->image && Storage::disk('public')->exists(str_replace('storage/', '', $item->image))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $item->image));
                }
            }

            // Gọi repository xóa sản phẩm
            $deletedProduct = $this->productRepository->delete($id);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Xóa sản phẩm thành công',
                'product' => $deletedProduct,
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Lỗi khi xóa sản phẩm: ' . $e->getMessage(),
                'product' => null,
            ];
        }
    }

    public function getAllProductsWithItems()
    {
        $products = $this->productRepository->getAllWithItems();

        return $products->map(function ($product) {
            return [
                'product_id' => $product->product_id,
                'product_name' => $product->product_name,
                'description' => $product->description,
                'category_id' => $product->category_id,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'items' => $product->items->map(function ($item) {
                    return [
                        'product_item_id' => $item->product_item_id,
                        'sku' => $item->SKU,
                        'qty_in_stock' => $item->qty_in_stock,
                        'price' => $item->price,
                        'image' => $item->image ? asset($item->image) : null,
                        'variation_options' => $item->variationOptions->map(function ($option) {
                            return [
                                'variation_option_id' => $option->variation_option_id,
                                'variation_option_name' => $option->value,
                                'variation_id' => $option->variation_id,
                            ];
                        })
                    ];
                })
            ];
        });
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
}
