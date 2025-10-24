<?php

namespace App\Repositories;

use App\Models\Variation;

class VariationRepository {
    protected $variation;

    public function __construct(Variation $variation){
        $this->variation = $variation;
    }

    public function save($data){
        $variation = new $this->variation;

        $variation->variation_name = $data['variation_name'];
        $variation->category_id = $data['category_id'];

        $variation->save();

        return $variation->fresh();
    }

    public function getAllVariation(){
        return $this->variation->get();
    }

    public function getById($id){
        return $this->variation->where("variation_id", $id)->get();
    }

    public function update($data, $id){

        $variation = $this->variation->find($id);
       
        $variation->variation_name = $data['variation_name'];
        $variation->category_id = $data['category_id'];

        $variation->update();

        return $variation;
    }

    public function delete($id){
        $variation = $this->variation->find($id);
        $variation->delete();
        
        return $variation;
    }
}
?>