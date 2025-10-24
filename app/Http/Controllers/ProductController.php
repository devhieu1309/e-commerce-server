<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        return $request;
        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'variants' => 'nullable|array',
            'variants.*.sku' => 'nullable|string',
            'variants.*.price' => 'nullable|numeric',
            'variants.*.stock' => 'nullable|integer',
            'variants.*.options' => 'required|array' // các variation_option id
        ]);

        DB::beginTransaction();
        try {
            // 1. Lưu thumbnail
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('products', 'public');
                $data['image'] = $path;
            }

            // 2. Tạo product
            $product = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'] ?? null,
                'description' => $data['description'] ?? null,
                'image' => $data['image'] ?? null
            ]);

            // 3. Tạo variants (product_items)
            if (!empty($data['variants'])) {
                foreach ($data['variants'] as $v) {
                    $itemData = [
                        'product_id' => $product->id,
                        'sku' => $v['sku'] ?? null,
                        'price' => $v['price'] ?? null,
                        'stock' => $v['stock'] ?? 0
                    ];

                    // Hỗ trợ ảnh từng biến thể: variants.*.image file
                    if (isset($v['image']) && $v['image'] instanceof UploadedFile) {
                        $itemData['image'] = $v['image']->store('product_items', 'public');
                    }

                    $item = ProductItem::create($itemData);

                    // Map options
                    foreach ($v['options'] as $optId) {
                        ProductConfiguration::create([
                            'product_item_id' => $item->id,
                            'variation_option_id' => $optId
                        ]);
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'Tạo sản phẩm thành công', 'product_id' => $product->id], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Lỗi tạo sản phẩm', 'error' => $e->getMessage()], 500);
        }
    }
}
