<?php

namespace App\Repositories;

use App\Models\UserReview;

class UserReviewRepository
{

    protected $userReview;

    public function __construct(UserReview $userReview)
    {
        $this->userReview = $userReview;
    }

    public function getAll()
    {
        return $this->userReview->with('user', 'shopOrder')->get();
    }

    public function getById($id)
    {
        return $this->userReview->where('user_review_id', $id)->get();
    }

    public function save($data)
    {
        $userReview = new $this->userReview;

        $userReview->rating = $data['rating'];
        $userReview->comment = $data['comment'];
        $userReview->user_id = $data['user_id'];
        $userReview->shop_order_id = $data['shop_order_id'];

        $userReview->save();

        return $userReview->fresh();
    }

    public function delete($id)
    {
        $userReview = $this->userReview->find($id);

        $userReview->delete();

        return $userReview;
    }
}
