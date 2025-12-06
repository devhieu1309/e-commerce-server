<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserReviewRequest;
use App\Services\UserReviewService;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class UserReviewController extends Controller
{
    //
    protected $userReviewService;

    public function __construct(UserReviewService $userReviewService)
    {
        $this->userReviewService = $userReviewService;
    }

    public function index()
    {
        try {
            $userReviews = $this->userReviewService->getAllUserReviews();
            return response()->json([
                'suscess' => true,
                'message' => 'Lấy danh sách đánh giá thành công.',
                'data' => $userReviews
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreUserReviewRequest $request)
    {
        try {
            $data = $request->all();
            $newReview = $this->userReviewService->saveUserReview($data);
            return response()->json([
                'success' => true,
                'message' => 'Đã đánh giá thành công.',
                'data' => $newReview
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Đánh giá thất bại',
                'message' => $e->getMessage(),
                500
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $newReview =  $this->userReviewService->deleteUserReview($id);
            return response()->json([
                'success' => true,
                'message' => 'Đánh giá đã được xóa thành công.',
                'data' => $newReview
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Xóa đánh giá thất bại'], 500);
        }
    }

    public function show($id)
    {
        try {
            $review = $this->userReviewService->findById($id);
            if ($review) {
                return response()->json([
                    'success' => true,
                    'data' => $review
                ], 200);
            } else {
                return response()->json(['error' => 'Đánh giá không tồn tại'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed towdwd fetch user review'], 500);
        }
    }
}
