<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository {
    protected $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function save($data){
        $product = new $this->product;

        $product->product_name = $data['product_name'];
        $product->category_id = $data['category_id'];
        $product->description = $data['description'];

        $product->save();

        return $product->fresh();
    }

    public function getAllVariation(){
        return $this->product->get();
    }

    public function getById($id){
        return $this->product->where("product_id", $id)->get();
    }

    public function update($data, $id){

        $product = $this->product->find($id);
       
        $product->product_name = $data['product_name'];
        $product->category_id = $data['category_id'];

        $product->update();

        return $product;
    }

    public function delete($id){
        $product = $this->product->find($id);
        $product->delete();
        
        return $product;
    }
}
?>