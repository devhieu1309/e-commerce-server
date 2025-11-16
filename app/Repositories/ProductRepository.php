<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function save($data)
    {
        $product = new $this->product;

        $product->product_name = $data['product_name'];
        $product->category_id = $data['category_id'];
        $product->description = $data['description'];

        $product->save();

        return $product->fresh();
    }

    public function getAllWithItems()
    {
        return Product::with(['items.variationOptions'])->get();
    }

    public function find($id)
    {
        return Product::with(['items.variationOptions'])->find($id);
    }

    //     public function find($id)
    // {
    //     return Product::find($id);
    // }

    public function update($product, $data)
    {
        $product->update($data);
        return $product;
    }


    public function delete($id)
    {
        $product = Product::with('items.variationOptions')->find($id);

        if (!$product) {
            return false;
        }

        // Xóa các biến thể (items) và mối quan hệ
        foreach ($product->items as $item) {
            $item->variationOptions()->detach(); // xóa trong bảng pivot product_configurations
            $item->delete();
        }

        // Xóa sản phẩm chính
        $product->delete();

        return $product;
    }
}
