<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoReview;
use App\Http\Requests\VideoReviewRequest;
use Illuminate\Support\Facades\Storage;

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


    public function store(VideoReviewRequest $request)
    {

        try {
            $data = $request->validated();

            if ($request->input('source_type') === 'upload' && $request->hasFile('video')) {
                $path = $request->file('video')->store('videos', 'public');
                $data['url'] = Storage::url($path);
            }

            $review = VideoReview::create($data);

            // $review = VideoReview::create($request->validated());

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

        $request->validate([
            'title' => 'required|string|max:255',
            'source_type' => 'required|in:youtube,upload',
            'product_id' => 'required|exists:products,id',
            'url' => 'nullable|string',
            'video' => 'nullable|file|mimes:mp4,mov,avi,mkv|max:20480',
        ]);

        $video->title = $request->title;
        $video->product_id = $request->product_id;
        $video->source_type = $request->source_type;

        //Trường hợp: Nguồn là YouTube
        if ($request->source_type === 'youtube') {
            // Nếu trước đó là upload => xóa file cũ
            if ($video->url && str_starts_with($video->url, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $video->url);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Gán link YouTube mới
            $video->url = $request->url;
        }

        //Trường hợp: Nguồn là upload từ máy
        elseif ($request->source_type === 'upload') {
            if ($request->hasFile('video')) {
                // Có video mới → xóa file cũ
                if ($video->url && str_starts_with($video->url, '/storage/')) {
                    $oldPath = str_replace('/storage/', '', $video->url);
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }

                // Lưu video mới
                $path = $request->file('video')->store('videos', 'public');
                $video->url = '/storage/' . $path;
            }
        }

        $video->save();

        return response()->json([
            'message' => 'Cập nhật video review thành công',
            'data' => $video,
        ]);
    }

    // Xóa video review
    public function destroy($id)
    {
        $video = VideoReview::findOrFail($id);
        if ($video->source_type === 'upload' && $video->url) {
            $path = str_replace('/storage/', '', $video->url);
            Storage::disk('public')->delete($path);
        }
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
