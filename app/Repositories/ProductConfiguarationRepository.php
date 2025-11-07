<?php

namespace App\Repositories;

use App\Models\ProductConfiguaration;
use Exception;

class ProductConfiguarationRepository
{
    protected $productConfiguaration;

    public function __construct(ProductConfiguaration $productConfiguaration)
    {
        $this->productConfiguaration = $productConfiguaration;
    }

    public function deleteByProductItem($productItemId)
    {
        // return ProductConfiguration::where('product_item_id', $productItemId)->delete();
        return ProductConfiguaration::where('product_item_id', $productItemId)->delete();
    }


    public function save($data)
    {
        $productConfiguaration = new $this->productConfiguaration;

        $productConfiguaration->product_item_id = $data['product_item_id'];
        $productConfiguaration->variation_option_id = $data['variation_option_id'];

        $productConfiguaration->save();
        return $productConfiguaration->fresh();
    }

    public function getAllProductConfiguaration()
    {
        return $this->productConfiguaration->get();
    }

    public function getById($id)
    {
        return $this->productConfiguaration->where("productConfiguaration_id", $id)->get();
    }

    public function update($data, $id)
    {

        $productConfiguaration = $this->productConfiguaration->find($id);

        $productConfiguaration->productConfiguaration_name = $data['productConfiguaration_name'];
        $productConfiguaration->description = $data['description'];

        $productConfiguaration->update();

        return $productConfiguaration;
    }

    public function delete($id)
    {
        $productConfiguaration = $this->productConfiguaration->find($id);
        $productConfiguaration->delete();

        return $productConfiguaration;
    }
}
