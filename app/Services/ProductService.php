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
use Illuminate\Http\Request;

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

    // public function getProductDetail($productId)
    // {
    //     // Lấy sản phẩm cùng với quan hệ liên quan
    //     $product = $this->productRepository->find($productId);

    //     if (!$product) {
    //         return null;
    //     }

    //     // Format lại dữ liệu trả về
    //     $data = [
    //         'product_id' => $product->product_id,
    //         'product_name' => $product->product_name,
    //         'description' => $product->description,
    //         'category_id' => $product->category?->category_id,
    //         'category_name' => $product->category?->category_name,
    //         'created_at' => $product->created_at,
    //         'updated_at' => $product->updated_at,
    //         'items' => $product->items->map(function ($item) {
    //             $variationLabels = $item->variationOptions->pluck('value')->toArray();

    //             return [
    //                 'product_item_id' => $item->product_item_id,
    //                 'variant_name' => implode(' - ', $variationLabels), // ví dụ "Đen - 128GB"
    //                 'sku' => $item->SKU,
    //                 'price' => number_format($item->price, 0, ',', '.') . ' đ',
    //                 'qty_in_stock' => $item->qty_in_stock,
    //                 'image' => $item->image ? asset($item->image) : null,
    //             ];
    //         }),
    //     ];

    //     return $data;
    // }

    // public function getProductDetail($id)
    // {
    //     $product = $this->productRepository->findByIdWithRelations($id, [
    //         'category',
    //         'items.variationOptions'
    //     ]);

    //     if (!$product) {
    //         return null;
    //     }

    //     return [
    //         'product_id' => $product->product_id,
    //         'product_name' => $product->product_name,
    //         'description' => $product->description,
    //         'category_id' => $product->category?->category_id,
    //         'category_name' => $product->category?->category_name,
    //         'created_at' => $product->created_at,
    //         'updated_at' => $product->updated_at,
    //         'items' => $product->items->map(function ($item) {
    //             return [
    //                 'product_item_id' => $item->product_item_id,
    //                 'sku' => $item->SKU,
    //                 'qty_in_stock' => $item->qty_in_stock,
    //                 'price' => $item->price,
    //                 'image' => $item->image ? asset($item->image) : null,
    //                 'variation_options' => $item->variationOptions->map(function ($option) {
    //                     return [
    //                         'variation_option_id' => $option->variation_option_id,
    //                         'variation_option_name' => $option->value,
    //                         'variation_id' => $option->variation_id,
    //                     ];
    //                 }),
    //             ];
    //         })
    //     ];
    // }


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
            'category_id' => $product->category?->category_id,
            'category_name' => $product->category?->category_name,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'items' => $product->items->map(function ($item) {
                // Lấy danh sách ID và label của các option
                $variationIds = $item->variationOptions->pluck('variation_option_id')->toArray();
                $variationLabels = $item->variationOptions->pluck('value')->toArray();

                return [
                    'product_item_id' => $item->product_item_id,
                    'variation_options' => $variationIds,    // ví dụ [1, 3]
                    'variant_name' => $variationLabels,      // ví dụ ["Đen", "128GB"]
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

    public function findById($id)
    {
        return $this->productRepository->find($id);
    }

    public function updateProductData($product, $data)
    {
        return $this->productRepository->update($product, $data);
    }


    // public function getAll()
    // {
    //     return $this->productRepository->getAllProduct();
    // }

    // public function getById($id)
    // {
    //     return $this->productRepository->getById($id);
    // }

    /**
     * Tạo mới sản phẩm kèm biến thể (items) và cấu hình (variation options).
     * Toàn bộ logic nghiệp vụ, transaction, upload file được xử lý ở Service.
     */
    public function createProductWithItems(Request $request)
    {
        $uploadedPaths = [];

        DB::beginTransaction();

        try {
            $dataProduct = $request->only([
                'product_name',
                'description',
                'category_id'
            ]);

            // Lưu thông tin chung sản phẩm
            $product = $this->saveProductData($dataProduct);

            // Lưu biến thể từng sản phẩm
            if (!empty($request->items) && is_array($request->items)) {
                foreach ($request->items as $index => $item) {

                    // Xử lý file image (nếu có)
                    $imagePath = null;

                    if ($request->hasFile("items.$index.image")) {
                        $file = $request->file("items.$index.image");

                        $filename = time() . '_' . preg_replace('/\s+/', '_', ($item['SKU'] ?? 'item')) . '.' . $file->getClientOriginalExtension();

                        Storage::disk('public')->put(
                            'product_items/' . $filename,
                            file_get_contents($file)
                        );

                        $path = 'storage/product_items/' . $filename;
                        $imagePath = $path;

                        $uploadedPaths[] = $path;
                    }

                    // Tạo product_item
                    $dataProductItem = [
                        'product_id'   => $product->product_id,
                        'SKU'          => $item['SKU'] ?? null,
                        'qty_in_stock' => isset($item['qty_in_stock']) ? $item['qty_in_stock'] : 0,
                        'price'        => isset($item['price']) ? $item['price'] : 0,
                        'image'        => $imagePath,
                    ];

                    $productItem = $this->productItemRepository->save($dataProductItem);

                    // Gắn option cho từng item
                    if (!empty($item['variation_options']) && is_array($item['variation_options'])) {
                        foreach ($item['variation_options'] as $optionId) {
                            $dataProductConfiguration = [
                                'product_item_id'      => $productItem->product_item_id,
                                'variation_option_id'  => $optionId,
                            ];
                            $this->productConfiguarationRepository->save($dataProductConfiguration);
                        }
                    }
                }
            }

            DB::commit();

            // Load lại product kèm items + configurations
            $product->load(['items.variationOptions']);

            // Chuẩn hóa dữ liệu trả về
            return $this->formatProductWithItems($product);
        } catch (Exception $e) {
            DB::rollBack();

            // Xóa các file đã upload nếu có (để tránh file rác)
            foreach ($uploadedPaths as $p) {
                if (Storage::disk('public')->exists(str_replace('storage/', '', $p))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $p));
                }
            }

            throw $e;
        }
    }

    /**
     * Cập nhật sản phẩm, các biến thể và variation options.
     */
    public function updateProductWithItems($id, Request $request)
    {
        $uploadedPaths = [];

        DB::beginTransaction();

        try {
            // Lấy product theo id
            $product = $this->findById($id);
            if (!$product) {
                return null;
            }

            // Cập nhật thông tin chung của sản phẩm
            $dataProduct = $request->only(['product_name', 'description', 'category_id']);
            $this->updateProductData($product, $dataProduct);

            // Cập nhật biến thể sản phẩm
            if (!empty($request->items) && is_array($request->items)) {
                foreach ($request->items as $index => $item) {
                    $productItem = null;

                    // Nếu có product_item_id => update, ngược lại => tạo mới
                    if (isset($item['product_item_id'])) {
                        $productItem = $this->productItemRepository->find($item['product_item_id']);
                        if (!$productItem) {
                            continue;
                        }
                    }

                    // Xử lý ảnh (nếu có upload mới)
                    $imagePath = $productItem ? $productItem->image : null;

                    if ($request->hasFile("items.$index.image")) {
                        $file = $request->file("items.$index.image");

                        // Xóa ảnh cũ nếu có
                        if ($productItem && $productItem->image && Storage::disk('public')->exists(str_replace('storage/', '', $productItem->image))) {
                            Storage::disk('public')->delete(str_replace('storage/', '', $productItem->image));
                        }

                        $filename = time() . '_' . preg_replace('/\s+/', '_', ($item['SKU'] ?? 'item')) . '.' . $file->getClientOriginalExtension();
                        Storage::disk('public')->put('product_items/' . $filename, file_get_contents($file));
                        $imagePath = 'storage/product_items/' . $filename;
                        $uploadedPaths[] = $imagePath;
                    }

                    // Dữ liệu cập nhật/insert product_item
                    $dataProductItem = [
                        'product_id'    => $product->product_id,
                        'SKU'           => $item['SKU'] ?? null,
                        'qty_in_stock'  => isset($item['qty_in_stock']) ? $item['qty_in_stock'] : 0,
                        'price'         => isset($item['price']) ? $item['price'] : 0,
                        'image'         => $imagePath,
                    ];

                    if ($productItem) {
                        // Update product item
                        $this->productItemRepository->update($productItem, $dataProductItem);
                    } else {
                        // Tạo mới product item
                        $productItem = $this->productItemRepository->save($dataProductItem);
                    }

                    // Cập nhật variation options
                    if (!empty($item['variation_options']) && is_array($item['variation_options'])) {
                        // Xóa option cũ
                        $this->productConfiguarationRepository->deleteByProductItem($productItem->product_item_id);

                        // Thêm mới option
                        foreach ($item['variation_options'] as $optionId) {
                            $dataConfig = [
                                'product_item_id'     => $productItem->product_item_id,
                                'variation_option_id' => $optionId,
                            ];
                            $this->productConfiguarationRepository->save($dataConfig);
                        }
                    }
                }
            }

            DB::commit();

            // Load lại toàn bộ product kèm items và variation options
            $product->load(['items.variationOptions']);

            return $this->formatProductWithItems($product);
        } catch (Exception $e) {
            DB::rollBack();

            // Xóa file đã upload nếu lỗi
            foreach ($uploadedPaths as $p) {
                if (Storage::disk('public')->exists(str_replace('storage/', '', $p))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $p));
                }
            }

            throw $e;
        }
    }

    /**
     * Chuẩn hóa dữ liệu product trả về cho API.
     */
    protected function formatProductWithItems($product)
    {
        return [
            'product_id'   => $product->product_id,
            'product_name' => $product->product_name,
            'description'  => $product->description,
            'category_id'  => $product->category_id,
            'created_at'   => $product->created_at,
            'updated_at'   => $product->updated_at,
            'items'        => $product->items->map(function ($item) {
                return [
                    'product_item_id' => $item->product_item_id,
                    'sku'             => $item->SKU,
                    'qty_in_stock'    => $item->qty_in_stock,
                    'price'           => $item->price,
                    'image'           => $item->image ? asset($item->image) : null,
                    'variation_options' => $item->variationOptions->map(function ($option) {
                        return [
                            'variation_option_id'   => $option->variation_option_id,
                            'variation_option_name' => $option->value,
                            'variation_id'          => $option->variation_id,
                        ];
                    }),
                ];
            }),
        ];
    }
}

