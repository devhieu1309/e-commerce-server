<?php

namespace App\Repositories;

use App\Models\ProductFavorites;

class FavoriteRepository
{
    protected $favoriteProduct;

    public function __construct(ProductFavorites $favoriteProduct)
    {
        $this->favoriteProduct = $favoriteProduct;
    }

    // public function getAll()
    // {
    //     return $this->favoriteProduct->get();
    // }
    public function getAll()
    {
        return $this->favoriteProduct
            ->with('productItem.product') // load chi tiết productItem và product
            ->get();
    }

    public function getById($id)
    {
        return $this->favoriteProduct->where('product_favorities_id', $id)->get();
    }

    public function save($data)
    {
        $favoriteProduct = new $this->favoriteProduct;

        $favoriteProduct->user_id = $data['user_id'];
        $favoriteProduct->product_item_id = $data['product_item_id'];

        $favoriteProduct->save();

        return $favoriteProduct->fresh();
    }

    public function update($favoriteProduct, $data)
    {
        $favoriteProduct->update($data);
        return $favoriteProduct;
    }

    public function delete($id)
    {
        $favoriteProduct = $this->favoriteProduct->find($id);
        $favoriteProduct->delete();

        return $favoriteProduct;
    }
}
