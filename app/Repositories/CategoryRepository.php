<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    /**
     * @var Category 
     */
    protected $category;

    /**
     * CategoryRepository constructor
     * 
     * @param Category $category
     */

    public function __construct(Category $category){
        $this->category = $category;
    }

    /**
     * Save Category
     *
     * @param $data
     * @return Category
     */
    public function save($data){
        $category = new $this->category;

        $category->category_name = $data['category_name'];
        $category->description = $data['description'];

        $category->save();

        return $category->fresh();
    }

    public function getAllCategory(){
        return $this->category->get();
    }

    public function getById($id){
        return $this->category->where("category_id", $id)->get();
    }

    public function update($data, $id){

        $category = $this->category->find($id);

        $category->category_name = $data['category_name'];
        $category->description = $data['description'];

        $category->update();

        return $category;
    }

    public function delete($id){
        $category = $this->category->find($id);
        $category->delete();
        
        return $category;
    }

}
?>