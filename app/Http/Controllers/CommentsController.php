<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentsRequest;
use App\Services\CommentsService;
use Exception;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    protected $commentsServices;

    public function __construct(CommentsService $commentsServices)
    {
        $this->commentsServices = $commentsServices;
    }

    public function index()
    {
        try {
            $comments = $this->commentsServices->getAll();
            return response()->json([
                'success' => true,
                'message' => $comments
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreCommentsRequest $request)
    {

        $data = $request->validated();
        try {
            $comment = $this->commentsServices->saveCommentsData($data);

            return response()->json([
                'success' => true,
                'message' => 'Đã bình luận thành công.',
                'data' => $comment
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),

            ], 500);
        }
    }
}
