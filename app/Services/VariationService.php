<?php

namespace App\Services;

use App\Repositories\VariationRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

use function Pest\Laravel\call;

class VariationService
{
    protected $variationRepository;

    public function __construct(VariationRepository $variationRepository)
    {
        $this->variationRepository = $variationRepository;
    }

    public function saveCategoryData($data)
    {
        $result = $this->variationRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->variationRepository->getAllVariation();
    }

    public function getById($id)
    {
        return $this->variationRepository->getById($id);
    }

    public function updateCategory($data, $id)
    {
        DB::beginTransaction();
        try {
            $variation = $this->variationRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Failed to update variation.");
        }

       DB::commit();

        return $variation;
    }

    public function deleteById($id){
        DB::beginTransaction();

        try{
            $variation = $this->variationRepository->delete($id);
        }catch(Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("Unable to delete variation data.");
        }

        DB::commit();

        return $variation;
    }
}
