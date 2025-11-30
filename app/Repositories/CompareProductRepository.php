<?php

namespace App\Repositories;

use App\Models\CompareProducts;

class CompareProductRepository
{

    protected $compareProduct;

    public function __construct(CompareProducts $compareProduct)
    {
        $this->compareProduct = $compareProduct;
    }

    public function getAll()
    {
        return $this->compareProduct->with('productItem.product')->get();
    }

    public function getById($id)
    {
        return $this->compareProduct->where('compare_product_id', $id)->get();
    }

    public function save($data)
    {
        $compareProduct = new $this->compareProduct;

        $compareProduct->product_item_id = $data['product_item_id'];
        $compareProduct->user_id = $data['user_id'] ?? [];

        $compareProduct->save();

        return $compareProduct->fresh();
    }

    public function update($data,  $id)
    {
        $compareProduct =  $this->compareProduct->findOrFail($id);

        $compareProduct->product_item_id = $data['product_item_id'];
        $compareProduct->user_id = $data['user_id'];

        $compareProduct->update();

        return $compareProduct;
    }

    public function delete($id)
    {
        $compareProduct = $this->compareProduct->find($id);

        $compareProduct->delete();

        return $compareProduct;
    }
}
