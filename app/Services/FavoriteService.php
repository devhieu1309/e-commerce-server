<?php

namespace App\Services;

use App\Repositories\FavoriteRepository;

class FavoriteService
{

    protected $favoriteRepository;

    public function __construct(FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function getAllFavoriteProduct()
    {
        $result = $this->favoriteRepository->getAll();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->favoriteRepository->getById($id);
        return $result;
    }

    public function saveFavoriteProduct($data)
    {
        $result = $this->favoriteRepository->save($data);
        return $result;
    }

    public function updateFavoriteProduct($data)
    {
        $result = $this->favoriteRepository->update($data);
        return $result;
    }

    public function deleteFavoriteProduct($id)
    {
        $result = $this->favoriteRepository->delete($id);
        return $result;
    }
}
