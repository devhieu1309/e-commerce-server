<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoReview;
use App\Http\Requests\VideoReviewRequest;

class VideoReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = VideoReview::with('product')->orderByDesc('video_id');

        // Lọc theo từ khóa
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%$search%");
        }

        // // Lọc theo sản phẩm
        if ($productId = $request->input('product_id')) {
            $query->where('product_id', $productId);
        }

        // Lọc theo trạng thái
        if ($request->has('is_visible')) {
            $query->where('is_visible', $request->boolean('is_visible'));
        }


        $limit = $request->query('limit', 10);
        $page = $request->query('page', 1);

        // $videos = $query->limit($limit)->get();
        $videos = $query->skip(($page - 1) * $limit)->take($limit)->get();

        return response()->json($videos);
    }

    // Thêm mới video review
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'title' => 'required|string|max:255',
    //         'url' => 'required|string|max:255',
    //         'is_visible' => 'boolean',
    //     ]);

    //     $video = VideoReview::create($validated);

    //     return response()->json($video, 201);
    // }

    public function store(VideoReviewRequest $request)
    {
        try {
            $review = VideoReview::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Thêm video review thành công',
                'data' => $review
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Thêm video review thất bại: ' . $e->getMessage()
            ], 500);
        }
    }

    // Cập nhật video review
    public function update(Request $request, $id)
    {
        $video = VideoReview::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|string|max:255',
            'is_visible' => 'boolean',
        ]);

        $video->update($validated);

        return response()->json($video);
    }

    // Xóa video review
    public function destroy($id)
    {
        $video = VideoReview::findOrFail($id);
        $video->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa video review thành công',
            'deleted_id' => $id
        ]);

    }

    // Ẩn/hiện video
    public function toggleVisibility($id)
    {
        $video = VideoReview::findOrFail($id);
        $video->is_visible = !$video->is_visible;
        $video->save();

        return response()->json([
            'message' => 'Cập nhật trạng thái thành công',
            'is_visible' => $video->is_visible,
        ]);
    }
}
