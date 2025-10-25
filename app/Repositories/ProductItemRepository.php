<?php

namespace App\Repositories;

use App\Models\ProductItem;

class ProductItemRepository
{
    protected $productItem;

    public function __construct(ProductItem $productItem)
    {
        $this->productItem = $productItem;
    }

    public function save($data)
    {
        $productItem = new $this->productItem;

        $productItem->SKU = $data['SKU'];
        $productItem->qty_in_stock = $data['qty_in_stock'];
        $productItem->price = $data['price'];
        $productItem->image = $data['image'];
        $productItem->product_id = $data['product_id'];

        $productItem->save();

        return $productItem->fresh();
    }

    public function getAllVariation()
    {
        return $this->productItem->get();
    }

    public function getById($id)
    {
        return $this->productItem->where("productItem_id", $id)->get();
    }

    public function update($data, $id)
    {

        $productItem = $this->productItem->find($id);

        $productItem->productItem_name = $data['productItem_name'];
        $productItem->category_id = $data['category_id'];

        $productItem->update();

        return $productItem;
    }

    public function delete($id)
    {
        $productItem = $this->productItem->find($id);
        $productItem->delete();

        return $productItem;
    }
}
