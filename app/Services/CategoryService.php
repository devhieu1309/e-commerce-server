<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class CategoryService
{

    /**
     * @var \App\Repositories\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryService contructor.
     * 
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Validate post data.
     * Store to DB if there are no error.
     * 
     * @param array $data
     *  @return \App\Models\Category
     */
    public function saveCategoryData($data)
    {
        $result = $this->categoryRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAllCategory();
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function updateCategory($data, $id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update category.");
        }

       DB::commit();

        return $category;
    }

    public function deleteById($id){
        DB::beginTransaction();

        try{
            $category = $this->categoryRepository->delete($id);
        }catch(Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Unable to delete category data.");
        }

        DB::commit();

        return $category;
    }
}
