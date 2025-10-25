<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductItem;
use App\Services\ProductService;
use App\Services\ProductConfiguarationService;
use App\Services\ProductItemService;
use App\Services\ProductC;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productService;
    protected $productItemService;
    protected $productConfiguarationService;

    public function __construct(ProductService $productService, ProductItemService $productItemService, ProductConfiguarationService $productConfiguarationService)
    {
        $this->productService = $productService;
        $this->productItemService = $productItemService;
        $this->productConfiguarationService =  $productConfiguarationService;
    }
    // public function index()
    // {
    //     $products = Product::all();
    //     return response()->json($products);
    // }

    // public function store(Request $request)
    // {
    //     $uploadedPaths = [];
    //     $dataProduct = $request->only([
    //         'product_name',
    //         'description',
    //         'category_id'
    //     ]);
    //     DB::beginTransaction();
    //     try {
    //         // Lưu thông tin chung sản phẩm
    //         $product = $this->productService->saveProductData($dataProduct);

    //         // Lưu biến thể từng sản phẩm
    //         if (!empty($request->items) && is_array($request->items)) {
    //             foreach ($request->items as $index => $item) {

    //                 // 2.a Xử lý file image (nếu có)
    //                 $imagePath = null;

    //                 if ($request->hasFile("items.$index.image")) {
    //                     $file = $request->file("items.$index.image");

    //                     $filename = time() . '_' . preg_replace('/\s+/', '_', ($item['SKU'] ?? 'item')) . '.' . $file->getClientOriginalExtension();

    //                     Storage::disk('public')->put(
    //                         'product_items/' . $filename,
    //                         file_get_contents($file)
    //                     );

    //                     $path = 'storage/product_items/' . $filename;
    //                     $imagePath = $path;


    //                     $uploadedPaths[] = $path;
    //                 }

    //                 //  2.b Tạo product_item
    //                 $dataProductItem = [
    //                     'product_id'   => $product->product_id,
    //                     'SKU'          => $item['SKU'] ?? null,
    //                     'qty_in_stock' => isset($item['qty_in_stock']) ? $item['qty_in_stock'] : 0,
    //                     'price'        => isset($item['price']) ? $item['price'] : 0,
    //                     'image' => $imagePath,
    //                 ];

    //                 $productItem = $this->productItemService->saveProductItemData($dataProductItem);
    //                 // 3 Gắn option cho từng item
    //                 if (!empty($item['variation_options']) && is_array($item['variation_options'])) {
    //                     foreach ($item['variation_options'] as $optionId) {
    //                         $dataProductConfiguration = [
    //                             'product_item_id' => $productItem->product_item_id,
    //                             'variation_option_id' => $optionId,
    //                         ];
    //                         $productConfiguaration = $this->productConfiguarationService->saveProductConfiguarationData($dataProductConfiguration);
    //                     }
    //                 }
    //             }
    //         }

    //         DB::commit();
    //         $product->load(['items' => function ($q) {
    //             $q->with('configurations');
    //         }]);

    //         $product->items->transform(function ($item) {
    //              dd($item);
    //             if ($item->product_image) {
    //                 $item->product_image_url = asset('storage/' . $item->product_image);
    //             } else {
    //                 $item->product_image_url = null;
    //             }
    //             var_dump($item);
    //             return $item;
    //         });

    //         return response()->json([
    //             'message' => 'Thêm sản phẩm thành công',
    //             'product' => $product,
    //         ], 201);
    //     } catch (Exception $e) {
    //         DB::rollBack();

    //         // Xóa các file đã upload nếu có (để tránh file rác)
    //         foreach ($uploadedPaths as $p) {
    //             if (Storage::disk('public')->exists($p)) {
    //                 Storage::disk('public')->delete($p);
    //             }
    //         }

    //         return response()->json([
    //             'error' => 'Lỗi khi tạo sản phẩm: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

    public function store(Request $request)
    {
        $uploadedPaths = [];
        $dataProduct = $request->only([
            'product_name',
            'description',
            'category_id'
        ]);
        DB::beginTransaction();
        try {
            // Lưu thông tin chung sản phẩm
            $product = $this->productService->saveProductData($dataProduct);

            // Lưu biến thể từng sản phẩm
            if (!empty($request->items) && is_array($request->items)) {
                foreach ($request->items as $index => $item) {

                    // 2.a Xử lý file image (nếu có)
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

                    //  2.b Tạo product_item
                    $dataProductItem = [
                        'product_id'   => $product->product_id,
                        'SKU'          => $item['SKU'] ?? null,
                        'qty_in_stock' => isset($item['qty_in_stock']) ? $item['qty_in_stock'] : 0,
                        'price'        => isset($item['price']) ? $item['price'] : 0,
                        'image' => $imagePath,
                    ];

                    $productItem = $this->productItemService->saveProductItemData($dataProductItem);
                    // 3 Gắn option cho từng item
                    if (!empty($item['variation_options']) && is_array($item['variation_options'])) {
                        foreach ($item['variation_options'] as $optionId) {
                            $dataProductConfiguration = [
                                'product_item_id' => $productItem->product_item_id,
                                'variation_option_id' => $optionId,
                            ];
                            $productConfiguaration = $this->productConfiguarationService->saveProductConfiguarationData($dataProductConfiguration);
                        }
                    }
                }
            }
            DB::commit();

            // Load lại product kèm items + configurations
            $product->load(['items.configurations.variationOption']);

            // Format lại dữ liệu trả về
            // return $product;
            $product->items = $product->items->map(function ($item) {
                return [
                    'product_item_id' => $item->product_item_id,
                    'sku' => $item->SKU,
                    'qty_in_stock' => $item->qty_in_stock,
                    'price' => $item->price,
                    'image' => $item->image ? asset($item->image) : null,
                    'configurations' => $item->configurations->map(function ($conf) {
                        return [
                            'variation_option_id' => $conf->variation_option_id,
                            'variation_option_name' => $conf->variationOption->name ?? null
                        ];
                    })
                ];
            });


            return response()->json([
                'message' => 'Thêm sản phẩm thành công',
                'product' => $product,
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();

            // Xóa các file đã upload nếu có (để tránh file rác)
            foreach ($uploadedPaths as $p) {
                if (Storage::disk('public')->exists($p)) {
                    Storage::disk('public')->delete($p);
                }
            }

            return response()->json([
                'error' => 'Lỗi khi tạo sản phẩm: ' . $e->getMessage(),
            ], 500);
        }
    }
}
