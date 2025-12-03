<?php

namespace App\Services;

use App\Repositories\UserReviewRepository;

class UserReviewService
{
    protected $userReviewRepository;

    public function __construct(UserReviewRepository $userReviewRepository)
    {
        $this->userReviewRepository = $userReviewRepository;
    }

    public function getAllUserReviews()
    {
        $result = $this->userReviewRepository->getAll();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->userReviewRepository->getById($id);
        return $result;
    }

    public function saveUserReview($data)
    {
        $result = $this->userReviewRepository->save($data);
        return $result;
    }

    public function deleteUserReview($id)
    {
        $result = $this->userReviewRepository->delete($id);
        return $result;
    }
}
