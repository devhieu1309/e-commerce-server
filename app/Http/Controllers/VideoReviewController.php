<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VideoReviewService;
use App\Http\Requests\VideoReviewRequest;
use Illuminate\Support\Facades\Storage;

class VideoReviewController extends Controller
{
    protected $service;

    public function __construct(VideoReviewService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $videos = $this->service->getList($request->all());
        return response()->json($videos);
    }


    public function store(VideoReviewRequest $request)
    {

        try {
            $review = $this->service->create($request);
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
        $video = $this->service->update($request, $id);
        return response()->json([
            'message' => 'Cập nhật video review thành công',
            'data' => $video,
        ]);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'Xóa video review thành công',
            'deleted_id' => $id
        ]);

    }

    // Ẩn/hiện video
    public function toggleVisibility($id)
    {
        $video = $this->service->toggleVisibility($id);
        return response()->json([
            'message' => 'Cập nhật trạng thái thành công',
            'is_visible' => $video->is_visible,
        ]);
    }
}
